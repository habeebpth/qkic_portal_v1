import { useState } from 'react';

export default function Avatar({ imageUrl, initials, size }) {
    const [failed, setFailed] = useState(false);
    const className = size === 'lg' ? 'avatar avatar-lg' : 'avatar';

    if (imageUrl && !failed) {
        return (
            <div className={className}>
                <img src={imageUrl} alt="" onError={() => setFailed(true)} />
            </div>
        );
    }

    return (
        <div className={className}>
            <span>{initials || 'S'}</span>
        </div>
    );
}
