export default function Authenticated({ children }) {
    return (
        <>
            <div className="min-h-screen bg-neutral-900 text-neutral-400">
                <div className="childcontainer">{children}</div>
            </div>
        </>
    );
}
