import MarkdownEditor from "@/Components/MarkdownEditor";
import StandardLink from "@/Components/StandardLink";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { defaultNoteContent } from "@/utils";
import { Head, useForm } from "@inertiajs/react";

export default function Create({ auth }) {
    const { setData, post, errors } = useForm({
        content: defaultNoteContent,
    });

    function onSubmit() {
        post(route("notes.store"));
    }

    function onChange(newValue) {
        setData("content", newValue);
    }

    return (
        <AuthenticatedLayout hideTopNav={true}>
            <Head title="Create a new Note" />

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
                    Back to Dashboard
                </StandardLink>
                <h2 className="text-neutral-100 text-4xl font-bold mt-4">
                    Create a new Note
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
                        defaultValue={defaultNoteContent}
                        submitText="Publish Note"
                        onSubmit={onSubmit}
                        onChange={onChange}
                    />
                </section>
            </div>
        </AuthenticatedLayout>
    );
}
