import { humanizeDate } from "@/utils";

export default function NoteDetails({ note, ...props }) {
    return (
        <div className="space-y-6">
            <p>
                Created {humanizeDate(note.created_at)} &bull; Updated{" "}
                {humanizeDate(note.updated_at)}
            </p>

            <div className="space-y-4 text-lg">
                {titleRow(note.metadata?.title)}

                {descriptionRow(note.metadata?.description)}

                {shareRow(note.metadata?.visibility, note.hashid)}

                {note.metadata?.tags?.length > 0 && tagsRow(note.metadata.tags)}
            </div>
        </div>
    );
}

const titleRow = (title) => (
    <div className="flex items-center">
        <p className="min-w-[200px] text-neutral-300">Title</p>
        <p className="min-w-[200px] text-neutral-100 font-medium">
            {title || "Untitled Note"}
        </p>
    </div>
);

const descriptionRow = (description) => (
    <div className="flex items-center">
        <p className="min-w-[200px] text-neutral-300">Description</p>
        <p
            className={
                "min-w-[200px] " +
                (description
                    ? "text-neutral-100 font-medium"
                    : "text-neutral-400 italic")
            }
        >
            {description || "No Description"}
        </p>
    </div>
);

const shareRow = (visibility, hashid) => (
    <div className="flex items-center">
        <p className="min-w-[200px] text-neutral-300">Share</p>
        {visibility === "public" ? (
            <p className="min-w-[200px] text-neutral-300 font-medium">
                Copy and paste{" "}
                <span className="py-0.5 px-1.5 bg-neutral-700 rounded-lg text-neutral-100 font-medium">
                    {route("note.share", hashid)}
                </span>{" "}
                to share this note with people.
            </p>
        ) : (
            <p className="min-w-[200px] text-neutral-300">
                Add{" "}
                <span className="py-0.5 px-1.5 bg-neutral-700 rounded-lg text-neutral-100 font-medium">
                    visibility: public
                </span>{" "}
                to this Note's header to enable sharing.
            </p>
        )}
    </div>
);

const tagsRow = (tags) => (
    <div className="flex items-center">
        <p className="min-w-[200px] text-neutral-300">Tags</p>
        <div className="w-full space-x-2">
            {tags.length &&
                tags.map((tag) => {
                    return (
                        <span
                            key={tag}
                            className="py-1 px-2 bg-neutral-700 rounded-full text-neutral-200 font-medium text-base"
                        >
                            {tag}
                        </span>
                    );
                })}
        </div>
    </div>
);
