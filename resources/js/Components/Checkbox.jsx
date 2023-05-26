export default function Checkbox({ className = "", ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                "rounded dark:bg-neutral-900 border-neutral-300 dark:border-neutral-700 text-teal-600 shadow-sm focus:ring-teal-500 dark:focus:ring-teal-600 dark:focus:ring-offset-neutral-800 " +
                className
            }
        />
    );
}
