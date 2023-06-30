import Heading from "../Heading";
import StandardLink from "../StandardLink";
import CodeIcon from "../Svg/CodeIcon";
import GuideIcon from "../Svg/GuideIcon";
import NoteIcon from "../Svg/NoteIcon";
import TemplateIcon from "../Svg/TemplateIcon";

export default function Resources() {
    return (
        <div className="space-y-6">
            <Heading level="h2" text="Resources" />

            <ul className="space-y-4">
                <li>
                    <StandardLink
                        className="space-x-2 group"
                        href={route("notes.create")}
                    >
                        <TemplateIcon />
                        <span>Note templates</span>
                    </StandardLink>
                    <p>
                        A collection of templates to help save time when
                        creating new notes
                    </p>
                </li>
                <li>
                    <StandardLink
                        className="space-x-2 group"
                        href={route("notes.create")}
                    >
                        <NoteIcon />
                        <span>Markdown reference</span>
                    </StandardLink>
                    <p>
                        A markdown cheatsheet providing a quick overview of
                        supported markdown features and frontmatter
                        configuration options
                    </p>
                </li>
                <li>
                    <StandardLink
                        className="space-x-2 group"
                        href={route("notes.create")}
                    >
                        <GuideIcon />
                        <span>Quick start guide</span>
                    </StandardLink>
                    <p>
                        A short guide to help you get familiar with notes, tags,
                        configuration and more
                    </p>
                </li>
                <li>
                    <StandardLink
                        className="space-x-2 group"
                        href={route("notes.create")}
                    >
                        <CodeIcon />
                        <span>GitHub repository</span>
                    </StandardLink>
                    <p>
                        The GitHub repository containing all of the source code
                        for this project
                    </p>
                </li>
            </ul>
        </div>
    );
}
