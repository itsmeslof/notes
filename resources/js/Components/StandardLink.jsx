import { Link } from "@inertiajs/react";

export default function StandardLink({ className = "", children, ...props }) {
    return (
        <Link
            {...props}
            className={
                "text-lg font-semibold text-sky-500 hover:text-sky-300 hover:underline inline-flex items-center transition duration-150 ease-in-out focus:outline-none " +
                className
            }
        >
            {children}
        </Link>
    );
}
