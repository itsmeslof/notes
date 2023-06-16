import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);

export const humanizeDate = (date) => dayjs(date).fromNow();

export const defaultNoteContent = `---
title: Example Note
description: Put a description here

tags:
  - tag1
  - example tag

visibility: private
author: private
---

# This is a header

> ### Quote title
>
> Quote body text

## List heading

- List item
  - Sub item
  - [As a link](https://notes.test)
`;
