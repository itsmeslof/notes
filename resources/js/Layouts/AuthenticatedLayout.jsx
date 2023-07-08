import { router, usePage } from "@inertiajs/react";
import { useEffect } from "react";

export default function Authenticated({ children }) {
    const { app_origin } = usePage().props;
    useEffect(() => {
        let links = document.querySelectorAll("#output a");
        links.forEach((link) => {
            link.addEventListener("click", (e) => {
                const origin = e.target.origin;
                const hash = e.target.hash;
                if (!(origin === app_origin) || hash) {
                    return;
                }

                e.preventDefault();
                router.visit(e.target.href);
            });
        });
    }, []);
    return (
        <>
            <div className="min-h-screen bg-neutral-900 text-neutral-400">
                <div className="childcontainer">{children}</div>
            </div>
        </>
    );
}
