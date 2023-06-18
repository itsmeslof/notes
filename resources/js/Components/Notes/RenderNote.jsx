export default function RenderNote({ outputHtml, ...props }) {
    return (
        <div
            className="mt-10 prose dark:prose-invert"
            id="output"
            dangerouslySetInnerHTML={{
                __html: outputHtml || "",
            }}
        ></div>
    );
}
