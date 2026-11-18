import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { login } from '../api.js';

export default function Login() {
    const navigate = useNavigate();
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');
    const [submitting, setSubmitting] = useState(false);

    async function handleSubmit(e) {
        e.preventDefault();
        setError('');
        setSubmitting(true);
        try {
            const response = await login(email, password);
            localStorage.setItem('student_token', response.data.token);
            navigate('/', { replace: true });
        } catch (err) {
            setError(err.response?.data?.message || err.message || 'Unable to login.');
        } finally {
            setSubmitting(false);
        }
    }

    return (
        <div className="centered-page">
            <div className="card">
                <h1>Student Portal</h1>
                <p className="subtitle">Sign in to view and download your exam transcripts.</p>

                {error && <div className="alert-error">{error}</div>}

                <form onSubmit={handleSubmit}>
                    <label htmlFor="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        required
                        autoFocus
                    />

                    <label htmlFor="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                    />

                    <button type="submit" disabled={submitting}>
                        {submitting ? 'Logging in…' : 'Login'}
                    </button>
                </form>

                <p className="footer-note">Use the email &amp; password your school gave you.</p>
            </div>
        </div>
    );
}
