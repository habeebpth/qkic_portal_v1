const PATHS = {
    calendar: (
        <>
            <rect x="3" y="4.5" width="18" height="16" rx="2" />
            <line x1="16" y1="2.5" x2="16" y2="6.5" />
            <line x1="8" y1="2.5" x2="8" y2="6.5" />
            <line x1="3" y1="9.5" x2="21" y2="9.5" />
        </>
    ),
    document: (
        <>
            <rect x="5" y="3" width="14" height="18" rx="2" />
            <line x1="8" y1="8" x2="16" y2="8" />
            <line x1="8" y1="12" x2="16" y2="12" />
            <line x1="8" y1="16" x2="13" y2="16" />
        </>
    ),
    chart: (
        <>
            <line x1="4" y1="20" x2="20" y2="20" />
            <rect x="6" y="12" width="3" height="8" />
            <rect x="10.5" y="7" width="3" height="13" />
            <rect x="15" y="15" width="3" height="5" />
        </>
    ),
    user: (
        <>
            <circle cx="12" cy="8" r="4" />
            <path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
        </>
    ),
    building: (
        <>
            <rect x="4" y="3" width="16" height="18" rx="1" />
            <rect x="7" y="6.5" width="2.5" height="2.5" />
            <rect x="14.5" y="6.5" width="2.5" height="2.5" />
            <rect x="7" y="11" width="2.5" height="2.5" />
            <rect x="14.5" y="11" width="2.5" height="2.5" />
            <rect x="7" y="15.5" width="2.5" height="2.5" />
            <rect x="14.5" y="15.5" width="2.5" height="2.5" />
        </>
    ),
    home: (
        <>
            <path d="M3 11l9-7 9 7" />
            <path d="M5 10v10h14V10" />
            <rect x="9.5" y="14" width="5" height="6" />
        </>
    ),
    users: (
        <>
            <circle cx="8" cy="8" r="3.2" />
            <path d="M2.5 20c0-3.5 3-5.5 5.5-5.5s5.5 2 5.5 5.5" />
            <circle cx="17" cy="9" r="2.6" />
            <path d="M14.8 14.3c2.8.3 4.7 2.3 4.7 5.7" />
        </>
    ),
    cap: (
        <>
            <path d="M12 3L2 8l10 5 10-5-10-5z" />
            <path d="M6 10.5V16c0 1.5 2.7 3 6 3s6-1.5 6-3v-5.5" />
            <line x1="22" y1="8" x2="22" y2="14" />
        </>
    ),
    logout: (
        <>
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" y1="12" x2="9" y2="12" />
        </>
    ),
};

export default function Icon({ name, size = 18 }) {
    return (
        <svg
            width={size}
            height={size}
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="1.8"
            strokeLinecap="round"
            strokeLinejoin="round"
            aria-hidden="true"
        >
            {PATHS[name] || null}
        </svg>
    );
}
