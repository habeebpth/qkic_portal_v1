import { useState } from 'react';
import Icon from './Icon.jsx';

export default function SchoolLogo({ logoUrl, schoolName }) {
    const [failed, setFailed] = useState(false);

    return (
        <div className="brand">
            <div className="school-logo">
                {logoUrl && !failed ? (
                    <img src={logoUrl} alt={schoolName || 'School logo'} onError={() => setFailed(true)} />
                ) : (
                    <Icon name="cap" size={20} />
                )}
            </div>
            <div className="brand-text">
                {schoolName && <span className="school-name">{schoolName}</span>}
                <span className="brand-subtitle">Student Portal</span>
            </div>
        </div>
    );
}
