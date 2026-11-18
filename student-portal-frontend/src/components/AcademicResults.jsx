import { useEffect, useState } from 'react';
import { downloadTranscript, getExamMarks, getSessionYears } from '../api.js';

export default function AcademicResults() {
    const [sessionYears, setSessionYears] = useState([]);
    const [sessionYearId, setSessionYearId] = useState(null);
    const [rows, setRows] = useState([]);
    const [selectedExamId, setSelectedExamId] = useState(null);
    const [loadingYears, setLoadingYears] = useState(true);
    const [loadingExams, setLoadingExams] = useState(false);
    const [error, setError] = useState('');
    const [downloadingId, setDownloadingId] = useState(null);

    useEffect(() => {
        getSessionYears()
            .then((response) => {
                const years = response.data.data || [];
                setSessionYears(years);
                const current = years.find((y) => y.default) || years[0];
                if (current) {
                    setSessionYearId(current.id);
                }
            })
            .catch((err) => setError(err.message || 'Unable to load session years.'))
            .finally(() => setLoadingYears(false));
    }, []);

    useEffect(() => {
        if (!sessionYearId) {
            return;
        }
        setLoadingExams(true);
        setSelectedExamId(null);
        getExamMarks(sessionYearId)
            .then((response) => setRows(response.data.data || []))
            .catch((err) => setError(err.message || 'Unable to load exam results.'))
            .finally(() => setLoadingExams(false));
    }, [sessionYearId]);

    async function handleDownload(result) {
        setDownloadingId(result.result_id);
        try {
            await downloadTranscript(result.exam_id, `transcript-${result.exam_name}.pdf`);
        } catch (err) {
            setError(err.message || 'Unable to download transcript.');
        } finally {
            setDownloadingId(null);
        }
    }

    const selected = rows.find((row) => row.result.exam_id === selectedExamId);
    const loading = loadingYears || loadingExams;

    return (
        <div className="tab-content">
            <div className="toolbar">
                <label htmlFor="session-year" className="toolbar-label">
                    Session Year
                </label>
                <select
                    id="session-year"
                    value={sessionYearId || ''}
                    onChange={(e) => setSessionYearId(Number(e.target.value))}
                    disabled={loadingYears || sessionYears.length === 0}
                >
                    {sessionYears.map((year) => (
                        <option key={year.id} value={year.id}>
                            {year.name}
                        </option>
                    ))}
                </select>
            </div>

            {error && <div className="alert-error">{error}</div>}

            {loading ? (
                <div className="panel">
                    <div className="empty-state">Loading…</div>
                </div>
            ) : selected ? (
                <ExamDetail
                    result={selected.result}
                    examMarks={selected.exam_marks}
                    downloading={downloadingId === selected.result.result_id}
                    onBack={() => setSelectedExamId(null)}
                    onDownload={() => handleDownload(selected.result)}
                />
            ) : rows.length === 0 ? (
                <div className="panel">
                    <div className="empty-state">No published exam results for this session year.</div>
                </div>
            ) : (
                <div className="panel">
                    <div className="table-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Exam</th>
                                    <th className="col-num">Marks</th>
                                    <th className="col-num">Grade</th>
                                    <th className="col-num">Result</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {rows.map(({ result }) => (
                                    <tr
                                        key={result.result_id}
                                        className="exam-row"
                                        onClick={() => setSelectedExamId(result.exam_id)}
                                    >
                                        <td>{result.exam_name}</td>
                                        <td className="col-num">
                                            {result.obtained_marks} / {result.total_marks}
                                        </td>
                                        <td className="col-num">{result.grade}</td>
                                        <td className="col-num">
                                            <span className={`pill ${result.status ? '' : 'fail'}`}>
                                                {result.status ? 'Pass' : 'Fail'}
                                            </span>
                                        </td>
                                        <td className="col-num">
                                            <span className="link-view">View Details →</span>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            )}
        </div>
    );
}

function ExamDetail({ result, examMarks, downloading, onBack, onDownload }) {
    const passed = !!result.status;

    return (
        <div className="panel exam-card">
            <div className="exam-card-header">
                <div>
                    <button className="btn-back" onClick={onBack}>
                        ← Back to exams
                    </button>
                    <h2>{result.exam_name}</h2>
                    <div className="exam-card-subtitle">{result.session_year}</div>
                </div>
                <button className="btn-download" onClick={onDownload} disabled={downloading}>
                    {downloading ? 'Downloading…' : 'Download PDF'}
                </button>
            </div>

            <div className="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th className="col-sr">SR No.</th>
                            <th>Subject</th>
                            <th className="col-num">Total Marks</th>
                            <th className="col-num">Obtained Marks</th>
                            <th className="col-num">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        {examMarks.map((mark, index) => (
                            <tr key={mark.marks_id}>
                                <td className="col-sr">{index + 1}</td>
                                <td>
                                    {mark.subject_name}
                                    {mark.subject_type && <span className="subject-type"> - {mark.subject_type}</span>}
                                </td>
                                <td className="col-num">{mark.total_marks}</td>
                                <td className="col-num">{mark.obtained_marks}</td>
                                <td className="col-num">{mark.grade}</td>
                            </tr>
                        ))}
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colSpan={2}>Total</th>
                            <th className="col-num">{result.total_marks}</th>
                            <th className="col-num">{result.obtained_marks}</th>
                            <th className="col-num">{result.grade}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div className="exam-summary">
                <div className="summary-item">
                    <span className="summary-label">Status</span>
                    <span className={`pill ${passed ? '' : 'fail'}`}>{passed ? 'Pass' : 'Fail'}</span>
                </div>
                <div className="summary-item">
                    <span className="summary-label">Percentage</span>
                    <span className="summary-value">{passed ? `${Number(result.percentage).toFixed(2)}%` : '-'}</span>
                </div>
                <div className="summary-item">
                    <span className="summary-label">Grade</span>
                    <span className="summary-value">{passed ? result.grade : '-'}</span>
                </div>
            </div>
        </div>
    );
}
