import { humanizeDate } from "@/utils";
import StandardLink from "../StandardLink";
import NoteIcon from "../Svg/NoteIcon";
import { useEffect } from "react";
import Heading from "../Heading";

export default function RecentNotes({ notes }) {
    return (
        <div className="space-y-4 flex-1">
            <Heading level="h2" text="Recent Notes" />

            {notes.length > 0 ? (
                <NotesList notes={notes} />
            ) : (
                <p>
                    Notes you have viewed in the last 14 days will appear here.
                </p>
            )}
        </div>
    );
}

function NotesList({ notes }) {
    return (
        <ul className="space-y-3">
            {notes.map((note) => (
                <li
                    key={note.hashid}
                    className="flex justify-between items-center space-x-20"
                >
                    <StandardLink
                        className="space-x-2 group min-w-[0px] flex-1"
                        href={route("notes.show", note)}
                    >
                        <NoteIcon />
                        <span className="truncate">
                            {note.metadata?.title || "Untitled note"}
                        </span>
                    </StandardLink>
                    <p>viewed {humanizeDate(note.last_viewed_at)}</p>
                </li>
            ))}
        </ul>
    );
}
