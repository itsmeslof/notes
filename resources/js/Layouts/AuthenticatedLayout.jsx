import { router, usePage } from "@inertiajs/react";
import { useEffect } from "react";

export default function Authenticated({ children }) {
    const { app_origin } = usePage().props;
    useEffect(() => {
        let links = document.querySelectorAll("#output a");
        for (let i = 0; i < links.length; i++) {
            links[i].onclick = (e) => {
                if (
                    e.target.origin === app_origin &&
                    e.target.hash[0] !== "#"
                ) {
                    e.preventDefault();
                    router.visit(e.target.href);
                }
            };
        }
    }, []);
    return (
        <>
            <div className="min-h-screen bg-neutral-900 text-neutral-400">
                <div className="childcontainer">{children}</div>
            </div>
        </>
    );
}
