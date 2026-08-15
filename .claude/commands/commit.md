# /commit

> Command to save my work to Git in a clean, well-described commit.

---

## Mission

When I run `/commit`, execute the following sequence:

### Step 1: Take stock

Run in parallel:
- `git status` to see modified and untracked files
- `git diff` to see unstaged changes
- `git diff --staged` to see already-staged changes
- `git log -5 --oneline` to learn the style of recent commit messages

### Step 2: Security check

Before proposing anything, verify that no sensitive file is about to be committed:
- Never `.env` or any variant containing real keys/secrets
- If a suspicious file shows up in `git status` (key, token, credentials), flag it clearly and ask for confirmation before continuing

### Step 3: Propose the commit

If there's nothing to commit, say so plainly and stop there.

Otherwise, summarize the changes and propose:
- The list of files to include (by default, all relevant modified/untracked files, never a blind `git add -A` if any suspicious files are present)
- A concise commit message (1-2 sentences) that explains the "why" rather than the "what," consistent with the style of previous commits

```
Here's what I'm about to commit:
- [file 1]
- [file 2]

Proposed message: "[commit message]"

Sound good?
```

### Step 4: Execute

Once approved:
1. `git add` only the relevant files (never `.env`)
2. `git commit` with the approved message, adding this footer:
   ```
   Co-Authored-By: Claude Sonnet 5 <noreply@anthropic.com>
   ```
3. `git status` to confirm the working tree is clean

### Step 5: Confirm

```
Saved. Commit [short hash]: "[message]"
```

---

## Important rules

- Never commit without explicit approval of the message and file list
- Never use `git add -A` or `git add .` without having checked `git status` first
- Never commit `.env` or any file containing real keys/secrets
- Never use `--no-verify`, `--amend`, or any option that bypasses hooks or rewrites history, unless explicitly requested
- Never push to a remote (`git push`) without a separate, explicit request
- Always create a new commit rather than amending, unless explicitly requested
- Communicate in English by default
