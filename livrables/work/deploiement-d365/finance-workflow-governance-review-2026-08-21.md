# Workflow_Finance.xlsx — Governance Review

_Prepared: 2026-08-21 | Scope: Finance and Budget Module workflows (WF-FIN-001 to 015, WF-XM-001 to 006) | File reviewed: `Workflow_Finance (12).xlsx`_

## 1. Purpose and method

`Workflow_Finance (12).xlsx` is Africa CDC's draft Table of Authority for the future Microsoft Dynamics 365 Finance module: for each of the 21 Finance/Budget-Module processes, it names an Initiator and a sequence of Approvers, and maps each approver role to a named staff member. Rule 10(5) of the Revised African Union Financial Rules and Regulations (FRR) explicitly requires this kind of document ("a Table of Authority (TOA) shall be maintained specifying the process, level of authority, approval and signatory thresholds for both the SAP ERP and the banking protocols"), so this workbook is doing exactly the job the Regulations call for.

This review checked the workbook against four independent sources found in the `ERP Documents` import folder:

1. **African Union Revised FRR.pdf** — the AU-wide Financial Rules and Regulations (69 pages).
2. **AU Procurement Manual 2024.pdf** — the AU-wide procurement rulebook (173 pages).
3. **AU Travel Policy March 2025RB.pdf** — the AU-wide travel and mission policy (57 pages).
4. **Africa CDC's own internal artifacts**, found once the folder was expanded: the Finance Directorate's SOP process maps (`Business Processes & SOP/Finance Directorate/PMT-*.pdf`, `Payment - RRT.pdf`, `Finance Core Functions.pdf`), the narrative ISO 9001 draft SOP (`AFRICA CDC ISO9001 Selected Finance SOPs Draft review.docx`), and the D365 requirements-engineering Workflow Catalog (`Business Processes & SOP/Generated/Phase-3_Workflows/WF-CAT-001_Workflow-Catalog_v0.3_20260523.xlsx`).

Source (4) turned out to be the most directly useful: it describes Africa CDC's *actual* current process, whereas (1)–(3) are AU-wide policy that Africa CDC must comply with but that doesn't spell out Africa CDC's own role titles. Findings below cite the specific document, page, or rule number wherever one exists. Where a claim could not be independently confirmed, it is marked "to verify" rather than stated as a defect — this is a review of a still-evolving draft (the D365 Workflow Catalog itself is marked "Draft — Phase 3 outputs," prepared by a Requirements Engineering Agent, with approval "PENDING — ICT Steering Committee review"), not a finished, signed-off control framework.

---

## 2. Summary table

| # | Workflow(s) | Issue | Severity |
|---|---|---|---|
| A1 | WF-FIN-002 | Missing pre-Finance authorization stage (Director Procurement + Director Administration, with a threshold gate) that Africa CDC's own process map shows | High |
| A2 | WF-FIN-014 | 8-step chain diverges sharply from Africa CDC's own documented "Advance payment to suppliers" SOP (4 approval steps); 20%/bank-guarantee control from the Procurement Manual not visible | High |
| A3 | WF-FIN-004 | Same staff hold "Finance Officer" (reconciliation preparer) and "AP Officer / Finance Treasury" (disbursement) roles simultaneously — conflicts with FRR Rule 56(3)(c) | High |
| A4 | Project-wide | D365 Workflow Catalog cites AU Financial Rule numbers that don't match their claimed subject in the actual FRR text | High |
| A5 | Project-wide | Workflow IDs WF-XM-002, WF-XM-003, WF-XM-006 are each reused for two unrelated processes in the master Workflow Catalog | High |
| B1 | Signatory Panels sheet | Panel A's mandatory signatory doesn't visibly sit in the Finance Directorate; the two Finance officials are relegated to the alternate slot | Medium — verify |
| B2 | WF-FIN-002/013 (Salary, RRT too) | Africa CDC's own flowcharts label the bank-signature step "Panel B" only; the narrative SOP says "Panel A & B" for the same step | Medium |
| B3 | WF-FIN-006 | "ICT Steering Committee" as a budget-transfer approver has no FRR basis, though it is corroborated by the separate Workflow Catalog | Medium — verify |
| B4 | WF-FIN-013 | Covers only the post-trip claim; pre-trip travel authorization is a separate chain not represented at all | Medium |
| B5 | WF-FIN-009 | "CFO" and "Director of Finance" listed as two separate sequential approvers, though FRR Rule 7 defines them as the same position | Medium |
| B6 | WF-FIN-003 | "Procurement Officer" as Initiator for an Accounts Receivable (revenue) workflow reads as a mapping error | Medium — verify |
| B7 | WF-FIN-014 | "Procurement Team Lead" doesn't appear anywhere in the Procurement Manual; "Head of Supply Chain" only appears under an AUC-wide table, not Africa CDC's own | Medium — verify |
| C1 | WF-FIN-011, WF-FIN-012 | No AU-wide regulatory text found governing multi-currency processing or tax; likely sits in the (unreviewed) Accounting Policies and Procedures Manual | Low / informational |
| C2 | WF-FIN-015 | Consistently marked TBD pending ADL-030 in both documents — nothing to reconcile | Informational |
| C3 | Scope | Payroll, Post-Service/Separation, and RRT payment SOPs exist at Africa CDC but have no corresponding WF-FIN row | Low — confirm out of scope |
| C4 | Users sheet | Workbook's own footnotes already flag several unresolved items (see §5) | Informational — elevate visibility |

---

## 3. High-severity findings

### A1 — WF-FIN-002 is missing a documented pre-Finance approval stage

Africa CDC's own process map, `Business Processes & SOP/Finance Directorate/PMT-Procurement.pdf` ("Payment - Procurement"), shows the following swimlanes in order:

**Requesting Unit → Procurement Unit** (Procurement Package Prepared → *Review & Authorization, Director Procurement*, gated by an explicit **Authorization Threshold** decision) **→ Admin Directorate** (*Review & Authorization, Director Administration*) **→ General Registry → Finance Registry → Finance** (Finance Officer 1 prep/reconciliation → Finance Officer 2 check & certification → *Review & Authorizations, Director Finance* → posting → bank signatories → payment).

`Workflow_Finance.xlsx`'s WF-FIN-002 chain is: **Procurement Officer (Initiator) → Certification Officer → Director of Finance → Signatories Panel A → Signatories Panel B.**

The Director Procurement and Director Administration authorization steps — including the value-based threshold gate — are entirely absent from the workbook's chain. This is independently corroborated by the AU Procurement Manual 2024 review: Annex II sets Africa CDC-specific contract-award thresholds (Head of Procurement up to $10,000 → Director Management and Administration $10,000–$50,000 → Director-General or Delegated Authority $50,000–$100,000 → Africa CDC Internal Procurement Committee $100,000–$1,500,000 → AU Tender Board above $1,500,000), and none of this threshold-based routing appears in the flat, non-branching WF-FIN-002 chain. The Manual also describes a documentary "three-way match" (PO/contract, Goods Received Note from the Inspection and Receiving Committee, and invoice) as the basis for confirming "goods actually received" before payment — consistent with FRR Rule 53(2)(b)-(c) — and that checkpoint isn't visible as a discrete step either, though the D365 Workflow Catalog's own notes on WF-FIN-002 do reference "Three-way match where PO exists," so the requirement is at least known to the project team.

**Recommendation:** confirm whether the Director Procurement / Director Administration approvals are meant to live in an upstream purchase-requisition or PO-approval workflow that feeds into WF-FIN-002 (in which case WF-FIN-002 as scoped is correct and just needs a documented dependency), or whether they need to be added to this chain directly. Either way, the threshold-based routing and the three-way match should be traceable to an explicit control point, not just implied.

### A2 — WF-FIN-014's chain diverges sharply from Africa CDC's own documented Advance-Payment SOP

`Workflow_Finance.xlsx` models WF-FIN-014 (Advance Payment to Suppliers) as an 8-step chain: **Procurement Officer → Procurement Team Lead → Head of Supply Chain → Director of Administration → Certification Officer → Senior Finance Officer → Director of Finance → Signatories Panel A → Signatories Panel B.** The Users sheet's own footnote confirms this chain was deliberately "corrected" (expanded) from an earlier version.

The "Advance payment to suppliers" procedure documented in `AFRICA CDC ISO9001 Selected Finance SOPs Draft review.docx` describes a much shorter process: **Department Focal Point → Finance Officer → Certifying Officer → Director of Finance** (who alone signs the transfer letter, with no split Panel A/B step for this specific payment type) **→ Mail runners → bank.** No Procurement Team Lead, Head of Supply Chain, Director of Administration, or Senior Finance Officer appears anywhere in that SOP's version of this process.

Separately, the AU Procurement Manual 2024 (§24.7.1–24.7.2, p.126–127) requires that supplier advances not exceed 20% of the contract sum and be backed by a bank guarantee (or approved insurer) before disbursement, with the Procurement Unit responsible for flagging outstanding advances on every subsequent payment request. Neither the workbook's chain nor the ISO SOP shows a visible checkpoint validating that ceiling or guarantee.

**Assessment:** the workbook's longer chain is plausibly a deliberate strengthening of controls — advance payments are inherently higher-risk than normal invoice payments, which would justify more approvers. But the gap between the "as-documented" SOP and the "to-be" ERP chain is large enough (4 extra approval hops, plus a second signatory panel) that it should be explicitly validated and signed off by Finance and Supply Chain leadership rather than carried into the D365 build on the strength of a single unconfirmed correction note. A checkpoint for the 20% ceiling and the bank-guarantee requirement should also be added somewhere in the chain, since it's currently invisible in both the workbook and the SOP.

### A3 — Bank reconciliation segregation-of-duties conflict

FRR Rule 56(3)(c) states: *"The reconciliation must be performed by the staff member not responsible for the receipt or disbursement of funds. If the staffing of an office makes this impracticable, alternative arrangements may be established in consultation with the Chief Financial Officer (CFO)."*

The Users sheet shows that the seven named staff who can initiate WF-FIN-004 (Bank Reconciliation) as "Finance Officer" — Liya Asfaw, Fabrice Bazibuhe, Momodou Fatty, Teopolina Ihuhua, Mosadikhumo Mlaize, Motsei Tiego, Bayou Tsegaw — each simultaneously hold the combined role bundle "Finance Officer, Finance Treasury, AP Officer, GL Accountant." In other words, the same individuals who prepare the reconciliation are also the ones responsible for AP disbursement and treasury custody of funds — precisely the conflict Rule 56(3)(c) is written to prevent.

**Recommendation:** confirm whether the FRR's stated exception path (documented consultation with the CFO / Director of Finance, given Africa CDC's staffing size makes full separation impracticable) has actually been invoked and recorded. If not, this is worth raising with Finance leadership before the D365 role design locks these combined role bundles in as system security roles — at that point, separating them becomes a much bigger rework.

### A4 — D365 Workflow Catalog cites AU Financial Rule numbers that don't match the actual FRR text

`WF-CAT-001_Workflow-Catalog_v0.3` (in `Business Processes & SOP/Generated/Phase-3_Workflows/`) attaches specific "AU Financial Rule" citations to several Finance workflows as their regulatory basis. Checked against the actual rule numbering in `African Union Revised FRR.pdf`:

| Workflow | Catalog's citation | What that rule number actually covers in the FRR | Likely correct rule |
|---|---|---|---|
| WF-FIN-001 (Journal Entry) | "Rule 22 (commitment)" | Rule 22 = *Statutory Contributions from Member States* | Not identified; possibly Rule 53 (Authorisation to Expend Appropriations) |
| WF-FIN-002 (AP Payment) | "Rule 25 (payment authorisation)" | Rule 25 = *Revenue Generating Activities* | Rule 53 (Authorisation to Expend Appropriations) |
| WF-FIN-006 (Budget Transfer) | "Rule 14 (budget transfers)" | Rule 14 = *Presentation and Content of the Budget* | Rule 19 (Reallocation / Virement) |
| WF-FIN-001 / 007 / 008 / 009 ("records") | "Rule 47 (records)" | Rule 47 = *Peace Fund Financial Management Reporting* (a specialized Peace Fund rule, unrelated to Africa CDC general-ledger records) | Possibly Rule 93/101 (Financial Statements) |

This is a documentation-integrity issue rather than a process-design flaw, but it matters: the Catalog marks most of these workflows "Fully Specified," and if these citations propagate into control narratives, staff training material, or an audit response, incorrect rule numbers will actively undermine credibility rather than support it. Given the Catalog's own cover sheet states it was "Prepared by: Requirements Engineering Agent" and is still "Draft — Phase 3 outputs" pending "ICT Steering Committee review," this looks like exactly the kind of AI-assisted drafting artifact that needs a human regulatory review pass before being finalized.

**Recommendation:** have whoever owns WF-CAT-001 re-verify every "AU Financial Rule X" citation against the actual FRR before the Catalog's specification status is upgraded past "Draft."

### A5 — Workflow IDs reused for unrelated processes

The Workflow Catalog itself contains duplicate workflow IDs describing entirely different processes:

- **WF-XM-002** appears twice: once as "Budget Overrun Escalation and Resolution" (Wave 1, matches `Workflow_Finance.xlsx`), and again as "Employee Self-Service — Leave, Expense, HR Request Submission" (Wave 2, 555 users, unrelated to budget).
- **WF-XM-003** appears twice: once as "System Access Request and Approval" (Wave 1, matches `Workflow_Finance.xlsx`), and again as "DocuSign Document Routing — Signature Request to Filing" (Wave 2, pending ADL-050).
- **WF-XM-006** appears twice, and neither Wave-1 definition cleanly matches `Workflow_Finance.xlsx`'s own WF-XM-006: the Catalog's WF-XM-006 is titled "Role Change and SoD Re-validation (previously Grant Overspend Alert)," owned by "Grants Officer / Grants Manager / Finance Manager," triggered by "Grant expenditure approaching or exceeding grant budget ceiling" — a Grants-module process, whereas `Workflow_Finance.xlsx`'s WF-XM-006 is an HR-Officer-initiated system role-change/SoD workflow approved by "ICT Governance Officer" then "Finance Manager / Module Owner." The name matches loosely; the trigger and business owner do not.

**Recommendation:** this needs to be resolved before D365 configuration begins — reused IDs across waves/modules are a real risk of two teams building against the same identifier for different purposes, or of test scripts and RACI entries pointing at the wrong process. Given the "previously Grant Overspend Alert" annotation, it looks like WF-XM-006 was renumbered at some point and the rename didn't fully propagate; worth checking whether WF-XM-002/003 suffered the same fate.

---

## 4. Medium-severity findings (verify with process owners)

**B1 — Signatory Panel A/B composition.** FRR's Bank Account Signatories rule requires Panel A's *mandatory* signatory to come from the Directorate of Finance or Finance-Units, with Panel B being the *countersigning* panel drawn from other Directorates. In the workbook's Signatory Panels sheet, Panel A's mandatory slot (A1) is Justin Maeda, "HOD Planning Reporting & Accountability," while the two actual Finance officials (Director of Finance, Senior Finance Officer) sit in the alternate A2 slot rather than being the mandatory signatory. Panel B's composition (HOD Public Health Institute mandatory, Director of Administration/Head of HR as alternates) does read as correctly non-Finance. Worth confirming whether "Planning, Reporting & Accountability" organizationally sits inside the Finance Directorate at Africa CDC — if not, Panel A's mandatory/alternate assignment looks inverted relative to the FRR rule.

**B2 — "Panel B" vs "Panel A & B" labeling inconsistency in Africa CDC's own SOP set.** All four Africa CDC flowchart diagrams reviewed (Payment-Procurement, Payment-Travel Allowance, Payment-Salary Request, Payment-RRT) label the bank-signature step as "Signatories (Bank Officers & Panel B)" — no Panel A mentioned. But the accompanying ISO 9001 narrative SOP text is explicit: *"Signatories from panel A & B... Director of Finance, Head of division (panel A) along with signatories from Panel B."* The workbook's own chain (Panel A then Panel B, sequential) actually matches the narrative SOP and the FRR correctly — it's the flowchart diagrams that need their label corrected so training material and D365 configuration don't imply a single signature is sufficient.

**B3 — "ICT Steering Committee" in WF-FIN-006.** This term never appears anywhere in the AU FRR. Initially this read as a likely data-entry error (perhaps copied from an IT-related workflow), but it is independently corroborated by the Workflow Catalog's own note on WF-FIN-006: *"Threshold-based escalation to ICT Steering Committee / DG."* So it's a deliberate, cross-document design choice rather than a typo — but its rationale doesn't derive from the FRR (which routes reallocations above 5% of the operating budget to the PRC, an external AU body, per Rule 19, not to an internal ICT committee). Worth tracing back to whatever internal Africa CDC decision (ADL log entry or circular) established this, since an outside auditor checking this chain against the Regulations alone won't find the basis for it.

**B4 — WF-FIN-013 covers only the post-trip claim.** Per the AU Travel Policy, pre-trip travel authorization (Chairperson or Deputy Chairperson → Commissioner/Director → Chief of Staff, §2.2–2.13) is a distinct process from the post-trip claim/reimbursement (§4.36, §7), and it isn't represented anywhere in `Workflow_Finance.xlsx`. Separately, the Policy's advance-approval path names the traveler's own Director and the Director of Finance directly (§7.2–7.3), with no textual mention anywhere in the Policy of a "Certification Officer" or "Senior Finance Officer" — those two roles may be legitimate internal Finance Directorate control layers simply not detailed in an administrative policy, but that should be confirmed rather than assumed. No explicit self-approval safeguard for senior travelers (Chairperson, Director-General) was found in the Policy either, which is a gap in the Policy itself, independent of the ERP workflow.

**B5 — WF-FIN-009's duplicated CFO / Director of Finance step.** FRR Rule 7 explicitly defines the CFO as "The Director of Finance Directorate of AU Commission" — the same position, not two different people. `Workflow_Finance.xlsx` lists WF-FIN-009's Approver 1 as "Finance Manager / CFO" and Approver 2 as "Director of Finance" — as written, this would require the same individual (currently Adedayo Akinwale) to approve the same financial report twice, under two different labels. Every other workflow in the sheet with a similarly combined label (e.g., "Director of Finance and Administration," "CFO / Director of Finance and Administration") was explicitly split by the analyst into two *different* people's sequential approvals, per the Users sheet's own footnote — WF-FIN-009 appears to be the one place that correction wasn't applied. Suggested fix: replace "Finance Manager / CFO" with "Finance Manager" alone as Approver 1, keeping "Director of Finance" as the genuinely distinct Approver 2.

**B6 — "Procurement Officer" as initiator of an Accounts Receivable workflow.** WF-FIN-003 (Accounts Receivable Invoice Issuance and Receipt) lists "Procurement Officer" as Initiator. Procurement is functionally the AP/purchasing side of Finance; AR is the revenue side (billing member states, donors, or partners for money owed to Africa CDC). Using the same "Procurement Officer" role for both WF-FIN-002 (AP) and WF-FIN-003 (AR) reads as a likely mapping error — a Finance Officer or dedicated AR role would be the expected initiator for AR invoice issuance. Worth a quick confirmation with the process owner.

**B7 — Unverified role titles in WF-FIN-014.** "Procurement Team Lead" does not appear anywhere in the 173-page AU Procurement Manual 2024. "Head of Supply Chain" appears only in the Manual's AUC-wide contract-award threshold table (Annex II); Africa CDC's own row in that same annex uses different titles entirely ("Head of Procurement," "Director Management and Administration," "Director-General or Delegated Authority"). Recommend checking both titles against Africa CDC's current org chart before they're finalized as D365 role names.

---

## 5. Lower-severity / informational

- **C1 — WF-FIN-011 (Multi-Currency) and WF-FIN-012 (Tax)** have no grounding in any of the three AU-wide documents reviewed — the FRR mentions currency fluctuation only once, as a justification for budget revision, and neither the Procurement Manual nor the Travel Policy addresses multi-currency processing or tax compliance. This is very likely covered instead by the Accounting Policies and Procedures Manual, which the FRR references repeatedly but which wasn't in the import folder — worth requesting it if a fuller check of these two workflows is wanted. The Workflow Catalog separately flags WF-FIN-011 as having an open item ("ADL-029 open") and WF-FIN-012's tax codes as still "to be confirmed" against Ethiopia host-country requirements, so this gap is already tracked elsewhere.

- **C2 — WF-FIN-015 (Intercompany Posting)** is marked "TBD — Pending ADL-030" in `Workflow_Finance.xlsx` itself, and the Workflow Catalog independently agrees ("TBD — Pending ADL-030... Scope TBD pending ICT Steering Committee decision"). Both sources are in agreement; nothing to reconcile.

- **C3 — Scope check.** Africa CDC's Finance Directorate SOP library documents at least three payment processes with their own dedicated flowcharts that have no corresponding row in `Workflow_Finance.xlsx`: Payroll (Salary, Benefits and Allowances), Post-Service/Separation Payment, and RRT (Rapid Response Team / EOC emergency) Payment. The workbook's own footnote states its scope is "Finance and Budget Module workflows only," so these may simply belong to a different workflow catalog (HR/Payroll, or an EOC-specific one) — worth a one-line confirmation that they're tracked somewhere rather than simply dropped.

---

## 6. Already self-flagged open items (from the workbook's own footnotes)

The Users sheet already documents several unresolved items in its own footnotes. These are the most concrete, decision-ready open items in the whole workbook and deserve first attention, since they're not interpretation on my part — they're the author's own flags:

1. **Four roles have no identifiable staff member at all**: AU Governing Bodies, DGA (Deputy Director-General Administration), External Auditor, ICT Steering Committee. These need manual assignment before the Table of Authority can be considered complete.
2. **Certification Officer and Tax Officer** are currently covered only by staff outside the "Active" filter used for the rest of the sheet: Certification Officer = Belay Worku (status "Under Renewal") and Alemu Beyene Gebretsadik; Tax Officer = Alemu Beyene Gebretsadik alone (status "Expired"). This is a real coverage gap in named, currently-active responsible individuals for two roles that sit in nearly every payment workflow.
3. **Single point of failure on Finance Manager.** Gerald Manthalu (HOD Public Financial Management & Lusaka Agenda) was removed from the Finance Manager pool at a stakeholder's request, leaving Hussein Mohamed as the sole named Finance Manager across 12 of the 21 workflows in this document. WF-XM-005 (Approval Delegation During Absence) exists specifically to cover this kind of gap, but the workbook doesn't show who Hussein Mohamed's designated delegate would be — worth naming one explicitly given how concentrated this role currently is.
4. **The role-label-splitting corrections are explicitly unvalidated.** The workbook's own note describes these as "a proposal to be validated" (e.g., interpreting "Director of Finance and Administration" as two sequential people rather than one combined title). Findings A2 and B5 above both intersect with this same open question — it's worth resolving centrally rather than workflow-by-workflow.

---

## 7. Suggested next steps

1. Circulate findings A1–A5 to the process owners named in the workbook (Director of Finance, Director Procurement/Supply Chain, and whoever owns the D365 Workflow Catalog) for confirmation or correction — these are the ones with the clearest evidence and the most consequence if carried unresolved into the D365 build.
2. Resolve the four roles with no assigned staff member and the Certification Officer / Tax Officer coverage gap (§6, items 1–2) — these block finalizing the Table of Authority regardless of any other finding.
3. Request the Accounting Policies and Procedures Manual referenced throughout the FRR, to properly validate WF-FIN-011 (Multi-Currency) and WF-FIN-012 (Tax), which none of the four sources reviewed here fully cover.
4. Before WF-CAT-001 is upgraded from "Draft" status, have a human reviewer re-check every AU Financial Rule citation (finding A4) and resolve the duplicate workflow IDs (finding A5).
