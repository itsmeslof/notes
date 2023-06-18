export default function Index({ auth, notes }) {
    return (
        <>
            {notes.map((note) => {
                return (
                    <a key={note.id} href={`/notes/${note.id}`}>
                        {note.name ?? "Unknown Note"}
                    </a>
                );
            })}
        </>
    );
}
