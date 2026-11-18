import Icon from './Icon.jsx';

export default function SectionHeading({ icon, children }) {
    return (
        <h3>
            <span className="info-icon-badge">
                <Icon name={icon} size={14} />
            </span>
            {children}
        </h3>
    );
}
