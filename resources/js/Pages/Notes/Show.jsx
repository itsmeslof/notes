import ManageNotecard from "@/Components/Notes/ManageNoteCard";
import RenderNote from "@/Components/Notes/RenderNote";
import NoteDetails from "@/Components/Notes/NoteDetails";
import StandardLink from "@/Components/StandardLink";
// import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TableOfContents from "@/Components/Notes/TableOfContents";

export default function Show({ errors, flash, auth, note, outputHtml, toc }) {
    return (
        <div className="min-h-screen bg-neutral-100 dark:bg-neutral-900 dark:text-neutral-400">
            <Head title={note.metadata?.title || "Untitled Note"} />

            <div className="bg-black/10 border-b-2 border-neutral-800">
                <div className="space-y-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                    {flash.status && (
                        <p className="text-neutral-200 bg-teal-600/20 border-2 border-teal-600 p-2 rounded-md">
                            {flash.status}
                        </p>
                    )}

                    {errors.content && (
                        <p className="text-neutral-200 bg-teal-600/20 border-2 border-teal-600 p-2 rounded-md">
                            {errors.content}
                        </p>
                    )}
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
                        Back to Dashboard
                    </StandardLink>
                    <div className="space-y-10">
                        <ManageNotecard note={note} />
                        <div className="h-[1px] w-full bg-neutral-800"></div>
                        <NoteDetails note={note} />
                    </div>
                </div>
            </div>

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                {toc && <TableOfContents toc={toc} />}
                <RenderNote outputHtml={outputHtml} />
            </div>
        </div>
    );
}
