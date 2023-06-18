import MarkdownEditor from "@/Components/MarkdownEditor";
import MaxWidthContainer from "@/Components/MaxWidthContainer";
import StandardLink from "@/Components/StandardLink";
import { Head, useForm } from "@inertiajs/react";

export default function Edit({ auth, note }) {
    const { setData, put, errors } = useForm({
        content: note.content,
    });

    function saveChanges() {
        put(route("notes.update", note));
    }

    function onChange(newValue) {
        setData("content", newValue);
    }

    return (
        <div className="min-h-screen bg-neutral-100 dark:bg-neutral-900 dark:text-neutral-400">
            <Head
                title={"Editing " + note.metadata?.title || "Untitled Note"}
            />

            <MaxWidthContainer classes="py-10">
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
                    Discard changes and go back to Note
                </StandardLink>
                <h2 className="text-neutral-100 text-4xl font-bold mt-4">
                    Edit Note
                </h2>
                <p className="mt-1 text-base">
                    See the{" "}
                    <StandardLink
                        href={route("markdown-reference")}
                        target="_BLANK"
                    >
                        Markdown Reference (Opens in new tab)
                    </StandardLink>{" "}
                    for information on supported features and formatting.
                </p>

                <section className="mt-10 space-y-4">
                    {errors.content && (
                        <p className="text-neutral-200 bg-rose-600/20 border-2 border-rose-600 p-2 rounded-md">
                            {errors.content}
                        </p>
                    )}
                    <MarkdownEditor
                        defaultValue={note.content}
                        submitText="Save Note"
                        onSubmit={saveChanges}
                        onChange={onChange}
                    />
                </section>
            </MaxWidthContainer>
        </div>
    );
}
