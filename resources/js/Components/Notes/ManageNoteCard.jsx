import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import StandardLink from "../StandardLink";
import { Head } from "@inertiajs/react";

export default function ManageNotecard({ note, ...props }) {
    return (
        <div className="bg-black/20 border-2 border-zinc-800 rounded-md p-6">
            <h2 className="text-neutral-100 text-2xl font-bold">
                Manage Note:
            </h2>
            <ul className="list-disc list-inside mt-4 ml-4 space-y-1">
                <li>
                    <StandardLink href={route("notes.edit", note)}>
                        Edit Note
                    </StandardLink>
                </li>
                <li>
                    <StandardLink href={route("notes.settings.show", note)}>
                        Note Settings
                    </StandardLink>
                </li>
                <li>
                    <StandardLink href={route("notes.delete.show", note)}>
                        Delete Note
                    </StandardLink>
                </li>
            </ul>
        </div>
    );
}
