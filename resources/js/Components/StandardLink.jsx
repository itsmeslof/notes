import { Link } from "@inertiajs/react";

export default function StandardLink({ className = "", children, ...props }) {
    return (
        <Link
            {...props}
            className={
                "text-neutral-300 hover:text-neutral-100 underline inline-flex items-center transition duration-150 ease-in-out focus:outline-none " +
                className
            }
        >
            {children}
        </Link>
    );
}
