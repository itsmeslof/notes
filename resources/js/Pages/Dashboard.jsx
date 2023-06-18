import MaxWidthContainer from "@/Components/MaxWidthContainer";
import StandardLink from "@/Components/StandardLink";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard({ auth, recentNotes }) {
    const recentNotesList = () => {
        const noNotes = (
            <li>
                No recent notes <a href="/notes/create">Create One Now</a>
            </li>
        );

        return !recentNotes.length
            ? noNotes
            : recentNotes.map((note) => {
                  return (
                      <li key={note.hashid} className="text-neutral-300">
                          <StandardLink
                              href={`/notes/${note.hashid}`}
                              className="underline hover:text-neutral-100"
                          >
                              {note.metadata?.title || "Untitled Note"}
                          </StandardLink>
                      </li>
                  );
              });
    };

    return (
        <AuthenticatedLayout>
            <Head title="Dashboard" />

            <div className="py-12">
                <MaxWidthContainer>
                    <h2 className="text-neutral-100 text-2xl font-bold">
                        Links on this page:
                    </h2>
                    <ul className="list-disc list-inside mt-4 ml-4 space-y-1 text-neutral-300">
                        <li>
                            <StandardLink
                                href="/notes/create"
                                className="underline text-teal-500 hover:text-teal-400"
                            >
                                Create a new Note
                            </StandardLink>
                        </li>
                        <li>
                            <StandardLink
                                href="/notes"
                                className="underline hover:text-neutral-100"
                            >
                                View all Notes
                            </StandardLink>
                        </li>
                        <li>
                            <StandardLink
                                href="/markdown-reference"
                                className="underline hover:text-neutral-100"
                            >
                                Markdown Reference
                            </StandardLink>
                        </li>
                        <li>
                            <StandardLink
                                href="/templates"
                                className="underline hover:text-neutral-100"
                            >
                                Note Templates
                            </StandardLink>
                        </li>
                    </ul>

                    <div className="mt-10">
                        <h2 className="text-neutral-100 text-4xl font-bold">
                            Recent Notes:
                        </h2>
                    </div>
                    <ul className="list-disc list-inside mt-4 ml-4">
                        {recentNotesList()}
                    </ul>
                </MaxWidthContainer>
            </div>
        </AuthenticatedLayout>
    );
}
