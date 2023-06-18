export default function MaxWidthContainer({ children, classes = "" }) {
    return (
        <div
            className={
                "max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" +
                (classes ? ` ${classes}` : "")
            }
        >
            {children}
        </div>
    );
}
