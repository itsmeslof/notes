const HEADING_STYLES = {
    h1: "text-neutral-100 text-4xl font-semibold",
    h2: "text-neutral-200 text-2xl font-medium",
};

export default function Heading({ level, text, ...rest }) {
    const HeadingLevel = level;
    return (
        <HeadingLevel className={HEADING_STYLES[level]}>{text}</HeadingLevel>
    );
}
