export default function CodeIcon({ className = "", ...props }) {
    return (
        <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            className={
                "text-neutral-300 group-hover:text-neutral-100 transition ease-in-out grow-0 shrink-0 basis-auto " +
                className
            }
            {...props}
        >
            <path
                fillRule="evenodd"
                clipRule="evenodd"
                d="M3 6C3 5.20435 3.31607 4.44129 3.87868 3.87868C4.44129 3.31607 5.20435 3 6 3H18C18.7956 3 19.5587 3.31607 20.1213 3.87868C20.6839 4.44129 21 5.20435 21 6V18C21 18.7956 20.6839 19.5587 20.1213 20.1213C19.5587 20.6839 18.7956 21 18 21H6C5.20435 21 4.44129 20.6839 3.87868 20.1213C3.31607 19.5587 3 18.7956 3 18V6ZM17.25 12C17.2498 12.1988 17.1707 12.3895 17.03 12.53L14.78 14.78C14.7113 14.8537 14.6285 14.9128 14.5365 14.9538C14.4445 14.9948 14.3452 15.0168 14.2445 15.0186C14.1438 15.0204 14.0438 15.0018 13.9504 14.9641C13.857 14.9264 13.7722 14.8703 13.701 14.799C13.6297 14.7278 13.5736 14.643 13.5359 14.5496C13.4982 14.4562 13.4796 14.3562 13.4814 14.2555C13.4832 14.1548 13.5052 14.0555 13.5462 13.9635C13.5872 13.8715 13.6463 13.7887 13.72 13.72L15.44 12L13.72 10.28C13.6463 10.2113 13.5872 10.1285 13.5462 10.0365C13.5052 9.94454 13.4832 9.84522 13.4814 9.74452C13.4796 9.64382 13.4982 9.54379 13.5359 9.4504C13.5736 9.35701 13.6297 9.27218 13.701 9.20096C13.7722 9.12974 13.857 9.0736 13.9504 9.03588C14.0438 8.99816 14.1438 8.97963 14.2445 8.98141C14.3452 8.98318 14.4445 9.00523 14.5365 9.04622C14.6285 9.08721 14.7113 9.14631 14.78 9.22L17.03 11.47C17.171 11.61 17.25 11.801 17.25 12ZM6.97 11.47C6.82955 11.6106 6.75066 11.8012 6.75066 12C6.75066 12.1988 6.82955 12.3894 6.97 12.53L9.22 14.78C9.28866 14.8537 9.37146 14.9128 9.46346 14.9538C9.55546 14.9948 9.65478 15.0168 9.75548 15.0186C9.85618 15.0204 9.95621 15.0018 10.0496 14.9641C10.143 14.9264 10.2278 14.8703 10.299 14.799C10.3703 14.7278 10.4264 14.643 10.4641 14.5496C10.5018 14.4562 10.5204 14.3562 10.5186 14.2555C10.5168 14.1548 10.4948 14.0555 10.4538 13.9635C10.4128 13.8715 10.3537 13.7887 10.28 13.72L8.56 12L10.28 10.28C10.3537 10.2113 10.4128 10.1285 10.4538 10.0365C10.4948 9.94454 10.5168 9.84522 10.5186 9.74452C10.5204 9.64382 10.5018 9.54379 10.4641 9.4504C10.4264 9.35701 10.3703 9.27218 10.299 9.20096C10.2278 9.12974 10.143 9.0736 10.0496 9.03588C9.95621 8.99816 9.85618 8.97963 9.75548 8.98141C9.65478 8.98318 9.55546 9.00523 9.46346 9.04622C9.37146 9.08721 9.28866 9.14631 9.22 9.22L6.97 11.47Z"
                fill="currentColor"
            />
        </svg>
    );
}
