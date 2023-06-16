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
    let lineCount = useMemo(() => value.split("\n").length, [value]);
    const linesArr = useMemo(
        () => Array.from({ length: lineCount }, (_, i) => i + 1),
        [lineCount]
    );

    const textAreaRef = useRef();
    useEffect(() => {
        enableTabToIndent(textAreaRef.current);
    }, [textAreaRef.current]);

    return (
        <form
            onSubmit={(e) => {
                e.preventDefault();
                onSubmit();
            }}
        >
            <div className="relative min-h-[100px] flex rounded-md bg-black/10 border border-neutral-800 overflow-scroll">
                <div className="text-base py-2 px-3 text-right bg-black/20 border-r border-neutral-800">
                    {linesArr.map((count) => (
                        <div key={count}>{count}</div>
                    ))}
                </div>

                <TextareaAutosize
                    autoFocus
                    className="font-fira min-h-[100px] bg-transparent w-full resize-none border border-transparent focus:outline-none focus:ring-0 focus:border-neutral-700 rounded-r-md text-neutral-200"
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
            </div>
        </form>
    );
}
