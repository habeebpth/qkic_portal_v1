import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { getCurrentSessionYear, getExamMarks, getProfile } from '../api.js';
import AcademicResults from '../components/AcademicResults.jsx';
import Icon from '../components/Icon.jsx';
import PersonalDetails from '../components/PersonalDetails.jsx';
import SchoolLogo from '../components/SchoolLogo.jsx';
import StatsStrip from '../components/StatsStrip.jsx';

const TABS = [
    { key: 'personal', label: 'Personal Details', icon: 'user' },
    { key: 'academic', label: 'Academic Results', icon: 'chart' },
];

export default function Dashboard() {
    const navigate = useNavigate();
    const [profile, setProfile] = useState(null);
    const [sessionYearName, setSessionYearName] = useState('');
    const [examStats, setExamStats] = useState({ count: 0, averagePercentage: null });
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');
    const [activeTab, setActiveTab] = useState('personal');

    useEffect(() => {
        async function load() {
            try {
                const [profileRes, sessionYearRes] = await Promise.all([getProfile(), getCurrentSessionYear()]);
                setProfile(profileRes.data.data);

                const sessionYear = sessionYearRes.data.data;
                setSessionYearName(sessionYear?.name || '');

                if (sessionYear?.id) {
                    const examRes = await getExamMarks(sessionYear.id);
                    const results = (examRes.data.data || []).map((row) => row.result);
                    const averagePercentage = results.length
                        ? results.reduce((sum, r) => sum + Number(r.percentage || 0), 0) / results.length
                        : null;
                    setExamStats({ count: results.length, averagePercentage });
                }
            } catch (err) {
                setError(err.message || 'Unable to load your profile.');
            } finally {
                setLoading(false);
            }
        }
        load();
    }, []);

    function handleLogout() {
        localStorage.removeItem('student_token');
        navigate('/login', { replace: true });
    }

    if (loading) {
        return (
            <div className="portal-page">
                <div className="panel" style={{ margin: 24 }}>
                    <div className="empty-state">Loading…</div>
                </div>
            </div>
        );
    }

    if (error || !profile) {
        return (
            <div className="portal-page">
                <div className="alert-error" style={{ margin: 24 }}>
                    {error || 'Unable to load your profile.'}
                </div>
            </div>
        );
    }

    return (
        <div className="app-shell">
            <aside className="sidebar">
                <div className="sidebar-brand">
                    <SchoolLogo logoUrl={profile.school?.logo} schoolName={profile.school?.name} />
                </div>

                <nav className="side-nav">
                    {TABS.map((tab) => (
                        <button
                            key={tab.key}
                            className={`side-nav-btn ${activeTab === tab.key ? 'active' : ''}`}
                            onClick={() => setActiveTab(tab.key)}
                        >
                            <Icon name={tab.icon} size={17} />
                            {tab.label}
                        </button>
                    ))}
                </nav>

                <div className="sidebar-footer">
                    <button className="btn-logout full-width" onClick={handleLogout}>
                        <Icon name="logout" size={15} />
                        Logout
                    </button>
                </div>
            </aside>

            <div className="main-column">
                <StatsStrip
                    sessionYearName={sessionYearName}
                    examCount={examStats.count}
                    averagePercentage={examStats.averagePercentage}
                />

                <main className="content-area">
                    {activeTab === 'personal' && <PersonalDetails profile={profile} sessionYearName={sessionYearName} />}
                    {activeTab === 'academic' && <AcademicResults />}
                </main>
            </div>
        </div>
    );
}
