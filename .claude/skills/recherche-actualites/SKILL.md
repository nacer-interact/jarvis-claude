---
name: recherche-actualites-contextualisees
description: Skill for running a personalized news watch. When the user asks "give me a rundown on the news", "what's happening today", "what do I need to know today", "run my news watch", or uses the /morning command, this skill takes over to search for news, filter it against the user's personal context (CONTEXT.md), and keep only what's relevant to their goals and active projects.
---

# Skill: Contextualized News Watch

## Mission

Run an intelligent news watch, **filtered against the user's personal context**. The goal isn't to report everything, but to keep only what genuinely matters to the user in their current situation.

---

## Phase 1: Load the user's context

Before any search, read these files to understand who the user is:

1. `context/CONTEXT.md` (who they are, what they do, their goals, their projects)
2. `context/HISTORY.md` (recent sessions, to understand active topics)

Identify internally:
- **Dominant profile** (student, employee, entrepreneur, freelancer)
- **Main activity** and sector
- **Short-term goals** (3-6 months)
- **Active projects**
- **Priority help area**

These 5 elements form the **relevance filter**.

---

## Phase 2: Ask for the scope of the watch

If the user hasn't specified a topic, ask them:

```
Which area do you want today's watch to cover?

1. AI and new technology news (default recommendation)
2. News from your industry
3. Economic and business news
4. A specific topic (to specify)
```

If the user directly types `/morning` or asks for a morning routine, launch straight into the default AI + industry watch, without asking the question.

---

## Phase 3: Run the search

Use the available web search tools (web_search or an MCP like Perplexity if connected) to retrieve today's or the last few days' news on the requested scope.

**Search strategy:**
- 3 to 5 targeted searches maximum
- Prioritize recent sources (ideally under 48 hours old)
- Cover 3 angles: major announcements, emerging trends, interesting weak signals
- French-language sources first, international if needed

**Example queries by profile:**

If profile = digital marketing student:
- "AI news digital marketing this week"
- "free AI tools for students 2026"
- "marketing automation trends"

If profile = SaaS entrepreneur:
- "AI news SaaS business"
- "new Claude OpenAI features"
- "entrepreneur productivity tools"

If profile = healthcare employee:
- "AI healthcare sector news"
- "AI regulation Europe healthcare"
- "new professional healthcare tools"

Adapt intelligently based on the context loaded in Phase 1.

---

## Phase 4: Filter against context

This is the key step that differentiates this skill from a plain Google search.

For each news item found, ask 3 questions:

1. **Does this news item directly relate to the user's goals?**
2. **Does it impact any of their active projects?**
3. **Does it change something in their sector or priority help area?**

If the answer is "no" to all 3 → discard the item.
If the answer is "yes" to at least 1 → keep the item.

Note to self: it's better to present 3 genuinely relevant items than 10 generic ones. The value of this skill is the filter.

---

## Phase 5: Present the result

Present the watch in exactly this format:

```
📰 Your watch for [today's date]

Filtered against your context: [1-line summary of profile and current focus]

---

🔥 What you absolutely need to know

[News item 1]
- Why it matters to you: [1-2 line personalized explanation]
- Source: [link]

[News item 2]
- Why it matters to you: [personalized explanation]
- Source: [link]

---

💡 Also worth knowing

[Item 3 or 4 - short bullet points]

---

🎯 Recommended action

[1 concrete action the user can take today based on the watch]
```

---

## Important rules

- **Always explain why it's relevant to THIS user**, not just "here's the news"
- **Maximum 3-4 items**, no more, or it becomes noise
- **Recommended action at the end**: this is what turns the watch into concrete value
- **Never invent** a news item or source. If the search turns up nothing interesting, say so honestly
- **No em dashes** in responses
- **Communicate in English by default**, unless the user asks otherwise

---

## If no relevant news is found

If, after searching, no news item passes the relevance filter, be honest:

```
📰 Your watch for [date]

I searched [areas covered] but didn't find any major news that directly impacts your current goals or projects today.

No noise for you today. Want me to broaden the search to another area?
```

This is better than padding it out with generic content that serves no purpose.
