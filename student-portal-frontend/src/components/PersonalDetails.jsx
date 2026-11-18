import Avatar from './Avatar.jsx';
import SectionHeading from './SectionHeading.jsx';

function Row({ label, value }) {
    return (
        <div className="info-row">
            <span className="info-label">{label}</span>
            <span className="info-value">{value || '-'}</span>
        </div>
    );
}

export default function PersonalDetails({ profile, sessionYearName }) {
    const classSection = profile.class_section;
    const initials = `${profile.first_name?.[0] || ''}${profile.last_name?.[0] || ''}`.toUpperCase();
    const guardian = profile.guardian;
    const hasGuardian = guardian && guardian.id;

    return (
        <div className="tab-content">
            <div className="panel profile-card">
                <Avatar imageUrl={profile.image} initials={initials} size="lg" />
                <div>
                    <h2>
                        {profile.first_name} {profile.last_name}
                    </h2>
                    <div className="profile-subtitle">
                        {classSection?.full_name}
                        {profile.school?.name ? ` | ${profile.school.name}` : ''}
                    </div>
                    <div className="badge-row">
                        {profile.admission_no && <span className="badge">Admission No: {profile.admission_no}</span>}
                        {profile.roll_number && <span className="badge">Roll No: {profile.roll_number}</span>}
                        <span className={`badge badge-status ${profile.status ? 'badge-active' : 'badge-inactive'}`}>
                            <span className="status-dot" />
                            {profile.status ? 'Active' : 'Inactive'}
                        </span>
                    </div>
                </div>
            </div>

            <div className="info-grid">
                <div className="panel info-box">
                    <SectionHeading icon="user">Basic Info</SectionHeading>
                    <Row label="Gender" value={profile.gender?.toUpperCase()} />
                    <Row label="DOB" value={profile.dob} />
                    <Row label="Mobile" value={profile.mobile} />
                    <Row label="Email" value={profile.email} />
                </div>

                <div className="panel info-box">
                    <SectionHeading icon="building">School &amp; Academic Session</SectionHeading>
                    <Row label="School" value={profile.school?.name} />
                    <Row label="Class &amp; Division" value={classSection?.full_name} />
                    <Row label="Medium" value={classSection?.medium?.name} />
                    <Row label="Session Year" value={sessionYearName} />
                    <Row label="Admission Date" value={profile.admission_date} />
                </div>

                <div className="panel info-box">
                    <SectionHeading icon="home">Address Info</SectionHeading>
                    <Row label="Current Address" value={profile.current_address} />
                    <Row label="Permanent Address" value={profile.permanent_address} />
                </div>
            </div>

            <h3 className="section-label">Guardian Details</h3>

            {hasGuardian ? (
                <div className="info-grid">
                    <div className="panel info-box">
                        <SectionHeading icon="users">Guardian Info</SectionHeading>
                        <Row label="Name" value={guardian.full_name} />
                        <Row label="Mobile" value={guardian.mobile} />
                        <Row label="Email" value={guardian.email} />
                        <Row label="Gender" value={guardian.gender?.toUpperCase()} />
                    </div>

                    <div className="panel info-box">
                        <SectionHeading icon="home">Guardian Address</SectionHeading>
                        <Row label="Current Address" value={guardian.current_address} />
                        <Row label="Permanent Address" value={guardian.permanent_address} />
                    </div>
                </div>
            ) : (
                <div className="panel">
                    <div className="empty-state">No guardian details available.</div>
                </div>
            )}
        </div>
    );
}
