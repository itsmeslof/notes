import StandardLink from "../StandardLink";
import CreateNoteIcon from "../Svg/CreateNoteIcon";
import ManageNotebooksIcon from "../Svg/ManageNotebooksIcon";
import SearchNotesIcon from "../Svg/SearchNotesIcon";
import NoteIcon from "../Svg/NoteIcon";
import Heading from "../Heading";

export default function QuickLinks({ className = "" }) {
    return (
        <div className={"space-y-4 " + className}>
            <Heading level="h2" text="Quick links" />
            <ul className="space-y-3">
                <li className="flex">
                    <StandardLink
                        className="space-x-2 group"
                        href={route("notes.create")}
                    >
                        <CreateNoteIcon />
                        <span>Create a new note</span>
                    </StandardLink>
                </li>
                <li className="flex">
                    <StandardLink className="space-x-2 group">
                        <NoteIcon />
                        <span>View all notes</span>
                    </StandardLink>
                </li>
                <li className="flex">
                    <StandardLink className="space-x-2 group">
                        <SearchNotesIcon />
                        <span>Search notes</span>
                    </StandardLink>
                </li>
                <li className="flex">
                    <StandardLink className="space-x-2 group">
                        <ManageNotebooksIcon />
                        <span>Manage notebooks</span>
                    </StandardLink>
                </li>
            </ul>
        </div>
    );
}
