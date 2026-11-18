import axios from 'axios';

const api = axios.create({
    baseURL: '/api/student',
});

api.interceptors.request.use((config) => {
    const token = localStorage.getItem('student_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

api.interceptors.response.use(
    (response) => {
        if (response.data?.error) {
            return Promise.reject(new Error(response.data.message || 'Something went wrong.'));
        }
        return response;
    },
    (error) => {
        if (error.response?.status === 401) {
            localStorage.removeItem('student_token');
            window.location.href = '/student-portal/login';
        }
        return Promise.reject(error);
    }
);

export function login(email, password) {
    return api.post('/login', { gr_number: email, password });
}

export function getProfile() {
    return api.get('/get-profile-data');
}

export function getCurrentSessionYear() {
    return api.get('/current-session-year');
}

export function getSessionYears() {
    return api.get('/all-session-years');
}

export function getExamMarks(sessionYearId) {
    return api.get('/exam-marks', { params: { session_year_id: sessionYearId } });
}

export async function downloadTranscript(examId, filename) {
    let response;
    try {
        response = await api.get(`/exam-result-pdf/${examId}`, { responseType: 'blob' });
    } catch (error) {
        // Error responses come back as a Blob too (because of responseType), so
        // the JSON `{error, message}` body has to be read out of it manually.
        if (error.response?.data instanceof Blob && error.response.data.type.includes('json')) {
            const text = await error.response.data.text();
            throw new Error(JSON.parse(text).message || 'Unable to download transcript.');
        }
        throw new Error('Unable to download transcript.');
    }

    const url = window.URL.createObjectURL(new Blob([response.data], { type: 'application/pdf' }));
    const link = document.createElement('a');
    link.href = url;
    link.download = filename || `transcript-${examId}.pdf`;
    document.body.appendChild(link);
    link.click();
    link.remove();
    window.URL.revokeObjectURL(url);
}

export default api;
