import TextareaAutosize from "react-textarea-autosize";
import PrimaryButton from "./PrimaryButton";
import { useEffect, useMemo, useRef, useState } from "react";
import { enableTabToIndent } from "indent-textarea";

export default function MarkdownEditor({
    defaultValue = "",
    submitText,
    onSubmit,
    onChange,
}) {
    let [value, setValue] = useState(defaultValue);

    const textAreaRef = useRef();
    useEffect(() => {
        const controller = new AbortController();
        enableTabToIndent(textAreaRef.current, controller.signal);

        return () => {
            controller.abort();
        };
    }, []);

    return (
        <form
            onSubmit={(e) => {
                e.preventDefault();
                onSubmit();
            }}
        >
            <TextareaAutosize
                autoFocus
                className="font-fira min-h-[100px] bg-black/10 w-full resize-none border border-neutral-800 focus:outline-none focus:ring-0 focus:border-neutral-700 rounded-md text-neutral-200"
                name="contents"
                id="contents"
                value={value}
                ref={textAreaRef}
                spellCheck={false}
                onChange={(e) => {
                    e.preventDefault();
                    setValue(e.target.value);
                    onChange(e.target.value);
                }}
            />

            <PrimaryButton type="submit" className="fixed right-4 top-4">
                {submitText}
            </PrimaryButton>
        </form>
    );
}
