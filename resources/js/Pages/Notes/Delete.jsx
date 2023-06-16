import DangerButton from "@/Components/DangerButton";
import StandardLink from "@/Components/StandardLink";
import { Head, router } from "@inertiajs/react";

export default function Delete({ auth, note }) {
    function confirmDelete() {
        router.delete(route("notes.delete.confirm", note));
    }

    return (
        <div className="min-h-screen bg-neutral-100 dark:bg-neutral-900 dark:text-neutral-400">
            <Head
                title={
                    "Delete Note - " + note.metadata?.title || "Untitled Note"
                }
            />

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <StandardLink href="/">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        className="w-5 h-5 mr-1"
                    >
                        <path
                            fillRule="evenodd"
                            d="M15 10a.75.75 0 01-.75.75H7.612l2.158 1.96a.75.75 0 11-1.04 1.08l-3.5-3.25a.75.75 0 010-1.08l3.5-3.25a.75.75 0 111.04 1.08L7.612 9.25h6.638A.75.75 0 0115 10z"
                            clipRule="evenodd"
                        />
                    </svg>
                    Cancel and go back to Note
                </StandardLink>
                <h2 className="text-neutral-100 text-4xl font-bold mt-4">
                    Delete Note
                </h2>

                <div className="mt-2 bg-rose-500/10 py-4 px-4 border-l-8 border-rose-500">
                    <p className="text-white">
                        This action is irreversible. Once deleted, this Note can
                        not be recovered. Please double check you are deleting
                        the correct Note.
                    </p>
                </div>

                <div className="mt-10">
                    <DangerButton onClick={confirmDelete}>
                        Acknowledge and delete note
                    </DangerButton>
                </div>
            </div>
        </div>
    );
}
