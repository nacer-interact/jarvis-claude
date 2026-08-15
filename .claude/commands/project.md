# /project

> Command to kick off a new project: ask a few initiation questions, create its deliverables folder, and set up a status file to track it going forward.

---

## Mission

When I run `/project`, execute the following sequence:

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

---

### Step 2: Determine the deliverables location

- If the project fits an existing theme under `livrables/work/` or `livrables/cabinet/`, use that folder.
- If it doesn't fit any existing theme, propose a new kebab-case subfolder name under the right category and confirm before creating it:
  ```
  This doesn't fit an existing theme. I'll create a new folder: livrables/[work|cabinet]/[proposed-name]/

  Sound good, or would you rename it?
  ```
- Create the folder (with a `.gitkeep` if empty) once confirmed.

---

### Step 3: Create the project status file

Write `livrables/[category]/[theme]/project-status.md` using this template, filled in from the answers:

```markdown
# [Project Name] — Status

_Last updated: [today's date, YYYY-MM-DD]_

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

Follow the same style as this workspace's other `project-status.md` files (D365, APPM, Interact International, drone startup, AI consulting): concise, no em dashes, dated Status Log entries that just get appended to going forward rather than rewritten.

---

### Step 4: Propose updating CONTEXT.md

Per the "Maintain My Context" rule in CLAUDE.md, a new project is exactly the kind of change that should be reflected in `context/CONTEXT.md`. Propose adding a one-line entry to the "Mes projets en cours" section:

```
Want me to also add this to your active projects list in context/CONTEXT.md?
- [Project Name]: [one-line description]
```

Only write it after confirmation.

---

### Step 5: Wrap up

```
Done. Created:
- livrables/[category]/[theme]/project-status.md
- [context/CONTEXT.md entry, if confirmed]

Want me to commit this with /commit?
```

Don't commit automatically, point to `/commit` and let that command's own confirmation flow handle it.

---

## Important rules

- Ask the questions in one batch, not one by one, unless an answer needs a follow-up to clarify
- Never invent a goal/objective, description, or deadline the user didn't give you
- Never create a new livrables theme folder without confirming the name first
- Match the existing `project-status.md` template style used by other projects in this workspace
- Don't auto-commit, always hand off to `/commit`
- No em dashes
- Communicate in English by default
