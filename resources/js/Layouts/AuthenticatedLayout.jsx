import { router, usePage } from "@inertiajs/react";
import { useEffect } from "react";

export default function Authenticated({ children }) {
    const { app_origin } = usePage().props;

    useEffect(() => {
        function onLinkClick(e) {
            const sameOrigin = e.target.origin === app_origin;
            const samePath = e.target.pathname === window.location.pathname;
            const hashFragment = e.target.hash;

            if (!sameOrigin || (hashFragment && samePath)) return;

            e.preventDefault();
            router.visit(e.target.href);
        }

        const allAnchors = [...document.querySelectorAll("#output a")];
        allAnchors.forEach((anchor) =>
            anchor.addEventListener("click", onLinkClick)
        );

        return () => {
            const allAnchors = [...document.querySelectorAll("#output a")];
            allAnchors.forEach((anchor) =>
                anchor.removeEventListener("click", onLinkClick)
            );
        };
    }, []);

    return (
        <>
            <div className="min-h-screen bg-neutral-900 text-neutral-400">
                <div className="childcontainer">{children}</div>
            </div>
        </>
    );
}
