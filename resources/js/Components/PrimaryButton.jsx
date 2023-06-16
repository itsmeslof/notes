export default function PrimaryButton({
    className = "",
    disabled,
    children,
    ...props
}) {
    return (
        <button
            {...props}
            className={
                `inline-flex items-center px-4 py-2 bg-neutral-800 dark:bg-teal-300 border border-transparent rounded-md font-semibold text-base text-white dark:text-teal-900 hover:bg-neutral-700 dark:hover:bg-teal-400 focus:bg-neutral-700 dark:focus:bg-teal-400 active:bg-neutral-900 dark:active:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150 ${
                    disabled && "opacity-25"
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
