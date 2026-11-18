import Icon from './Icon.jsx';

function scoreTone(value) {
    if (value === null) return 'neutral';
    if (value >= 75) return 'good';
    if (value >= 40) return 'warn';
    return 'bad';
}

export default function StatsStrip({ sessionYearName, examCount, averagePercentage }) {
    return (
        <div className="stats-strip">
            <div className="stat-tile">
                <span className="stat-icon tone-blue">
                    <Icon name="calendar" />
                </span>
                <div>
                    <div className="stat-label">Session Year</div>
                    <div className="stat-value">{sessionYearName || '-'}</div>
                </div>
            </div>
            <div className="stat-tile">
                <span className="stat-icon tone-purple">
                    <Icon name="document" />
                </span>
                <div>
                    <div className="stat-label">Exams Published</div>
                    <div className="stat-value">{examCount}</div>
                </div>
            </div>
            <div className="stat-tile">
                <span className={`stat-icon tone-${scoreTone(averagePercentage)}`}>
                    <Icon name="chart" />
                </span>
                <div>
                    <div className="stat-label">Average Score</div>
                    <div className="stat-value">
                        {averagePercentage === null ? '-' : `${averagePercentage.toFixed(1)}%`}
                    </div>
                </div>
            </div>
        </div>
    );
}
