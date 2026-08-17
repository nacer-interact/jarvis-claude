# /projects

> Command to manage the full lifecycle of a project: create it, update its status, list active work, and close it out (complete, pause, resume, or cancel).

---

## Mission

`/projects` can be run with or without an argument telling it what to do:

- `/projects` (nothing after it) → ask which action, see Step 0
- `/projects new` → jump straight to creation
- `/projects update [name]` → log progress on an existing project
- `/projects list` → show all tracked projects at a glance
- `/projects complete [name]` → close out a finished project
- `/projects pause [name]` → put a project on hold
- `/projects resume [name]` → reactivate a paused project
- `/projects cancel [name]` → close out a project that's being dropped, not finished

If `[name]` is omitted where one is needed, follow the project lookup process in Step A before proceeding.

---

### Step 0: No action given

If I run `/projects` with nothing else, ask in one message:

```
What do you want to do?

1. Start a new project
2. Update an existing project's status
3. See a list of all your projects
4. Mark a project as completed
5. Pause a project
6. Resume a paused project
7. Cancel a project
```

Then follow the matching flow below.

---

### Step A: Finding the right project (used by Update, Complete, Pause, Resume, Cancel)

1. Find every project status file in the workspace: any `*-status.md` under `livrables/work/` or `livrables/cabinet/` (covers `project-status.md`, `website-project-status.md`, `design-system-project-status.md`, etc.).
2. If a name/keyword was given with the command, match it against the file's H1 title or folder name. If exactly one match, use it.
3. If no name was given, or the match is ambiguous, or nothing matches, list the candidates (title + folder path) and ask me to pick.
4. Never guess which project I mean when there's more than one reasonable match.

---

## Flow: New project

### Step 1: Ask the initiation questions

Ask these together, in one message:

```
Let's set up your new project. A few questions:

1. What's the project called? (short name, will also become its folder name)
2. What is it, in a sentence or two?
3. What's the goal or objective? What does success look like?
4. Is this a Work project (Africa CDC) or a Cabinet project (entrepreneurial/personal)?
5. Does it fit one of your existing themes, or is it something new?
   - Work themes: gouvernance-strategie-it, infrastructure-cloud-azure, deploiement-d365, plateforme-appm, conseil-etats-membres
   - Cabinet themes: interact-international, consulting-ia-automatisation, startup-drones, personnel
6. Any deadline or target date?
7. Anyone else involved (partners, stakeholders, team)?
```

If an answer is vague (especially the goal/objective), ask a follow-up to sharpen it rather than guessing. Deadline and people involved can be skipped if not applicable, note that in the message.

### Step 2: Determine the deliverables location

- If the project fits an existing theme under `livrables/work/` or `livrables/cabinet/`, use that folder.
- If it doesn't fit any existing theme, propose a new kebab-case subfolder name under the right category and confirm before creating it:
  ```
  This doesn't fit an existing theme. I'll create a new folder: livrables/[work|cabinet]/[proposed-name]/

  Sound good, or would you rename it?
  ```
- Create the folder (with a `.gitkeep` if empty) once confirmed.

### Step 3: Create the project status file

Write `livrables/[category]/[theme]/project-status.md` using this template, filled in from the answers:

```markdown
# [Project Name] — Status

_Last updated: [today's date, YYYY-MM-DD]_
**Status:** Active

## Goal / Objective

[goal/objective from Q3]

## Description

[description from Q2]

## Current Phase

Just kicked off.

## Completed

(none yet)

## In Progress / Up Next

- [first concrete next step, if known, otherwise omit]

## Team

[people/stakeholders from Q7, or omit this section if none]

## Deadline

[target date from Q6, or omit this section if none]

## Status Log

### [today's date]
- Project created: [description]
- Goal: [goal/objective]
```

Follow the same style as this workspace's other `project-status.md` files: concise, no em dashes, dated Status Log entries that just get appended to going forward rather than rewritten.

### Step 4: Propose updating CONTEXT.md

Per the "Maintain My Context" rule in CLAUDE.md, a new project is exactly the kind of change that should be reflected in `context/CONTEXT.md`. Propose adding a one-line entry to the "Mes projets en cours" section:

```
Want me to also add this to your active projects list in context/CONTEXT.md?
- [Project Name]: [one-line description]
```

Only write it after confirmation.

### Step 5: Wrap up

```
Done. Created:
- livrables/[category]/[theme]/project-status.md
- [context/CONTEXT.md entry, if confirmed]

Want me to commit this with /commit?
```

---

## Flow: Update

Once the project is identified (Step A):

1. Read the current status file in full.
2. Ask what changed, in one message:
   ```
   What's changed on [Project Name]?

   1. New things completed?
   2. Current phase moved forward?
   3. New items to add to "In Progress / Up Next"?
   4. Deadline changed?
   5. Anything else worth logging?
   ```
3. Based on the answers, propose the specific edits (which section, old → new) before writing anything.
4. On confirmation:
   - Update `_Last updated:_` to today's date
   - If the file has no `**Status:**` line yet, add one (default `Active`) right under `_Last updated:_` — this is a one-time retrofit for files created before this field existed, not a separate migration step to call out
   - Update `Current Phase`, `Completed`, `In Progress / Up Next`, `Deadline` as needed
   - Append a new dated entry to `Status Log` (never rewrite past entries)
5. Wrap up and offer `/commit`, same as the New flow.

---

## Flow: List

1. Find every project status file per Step A.1.
2. For each, extract: title (H1), `**Status:**` if present (else show `Active (unconfirmed)` — assume active but flag that the file predates this field), the first line of `Current Phase`, and `Deadline` if present.
3. Present grouped by Work / Cabinet, Active projects first, then Paused, with Completed and Cancelled collapsed into a short one-line-each summary at the bottom (not full detail, this list is about what needs attention).
4. This is read-only. Don't edit any files during this flow.

---

## Flow: Complete

Once the project is identified (Step A):

1. Confirm the wrap-up in one message before writing anything:
   ```
   Marking [Project Name] as completed. Anything to capture as the final outcome before I close it out?
   ```
2. On confirmation, update the status file:
   - `**Status:** Completed`
   - `Current Phase` replaced with a short closing summary
   - Final dated entry in `Status Log` capturing the outcome
3. Propose updating `context/CONTEXT.md`: since a completed project shouldn't usually stay listed under "Mes projets en cours", propose removing or moving its line. Only write after confirmation.
4. Wrap up and offer `/commit`.

---

## Flow: Pause

Once the project is identified (Step A):

1. Ask in one message:
   ```
   Pausing [Project Name]. Why, and is there a known trigger to resume it (a date, an event, waiting on someone)?
   ```
2. On confirmation, update the status file:
   - `**Status:** Paused`
   - `Current Phase` updated to note it's on hold and why
   - Dated entry in `Status Log`
3. Don't remove it from `context/CONTEXT.md`, but propose annotating its line with "(paused)" if one exists there.
4. Wrap up and offer `/commit`.

---

## Flow: Resume

Once the project is identified (Step A, only offer projects with `**Status:** Paused`):

1. Confirm: "Resuming [Project Name]. Anything changed while it was paused that should be reflected?"
2. On confirmation, update the status file:
   - `**Status:** Active`
   - `Current Phase` updated
   - Dated entry in `Status Log`
3. If its `context/CONTEXT.md` line was annotated "(paused)", propose removing the annotation.
4. Wrap up and offer `/commit`.

---

## Flow: Cancel

Once the project is identified (Step A):

1. Ask in one message: "Cancelling [Project Name]. What's the reason, for the record?"
2. On confirmation, update the status file:
   - `**Status:** Cancelled`
   - `Current Phase` replaced with a short closing note (why it was dropped)
   - Final dated entry in `Status Log`
3. Propose removing its line from `context/CONTEXT.md`'s active projects list. Only write after confirmation.
4. Wrap up and offer `/commit`.

---

## Important rules

- Ask questions in one batch, not one by one, unless an answer needs a follow-up to clarify
- Never invent a goal, description, deadline, or outcome I didn't give you
- Never create a new livrables theme folder without confirming the name first
- Never guess which project I mean when more than one file could match: list the candidates and ask
- Match the existing `project-status.md` template style used across this workspace
- Always append to `Status Log`, never rewrite or delete past entries
- Don't auto-commit, always hand off to `/commit` and let that command's own confirmation flow handle it
- Don't edit `context/CONTEXT.md` without explicit confirmation, in any flow
- No em dashes
- Communicate in English by default
