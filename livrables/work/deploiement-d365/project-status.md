# Dynamics 365 Deployment — Project Status

_Last updated: 2026-08-21_

## Current Phase

Transitioned from requirements gathering into solution design and technical architecture preparation.

## Completed

- Extensive requirements validation exercise across core business functions: Finance, Asset Management, Grants & Projects, Budget Management, Human Resources, Payroll, and Fixed Assets
- Business process reviews conducted with stakeholders across the organization
- Multiple Functional Requirements Documents (FRDs) produced with the implementation partner
- Architecture artefacts produced
- Integration inventories produced
- Implementation workplans produced

## In Progress / Up Next

- Solution design and technical architecture
- Configuration planning
- Integration planning
- Security architecture
- Data migration preparation

## Risks / Open Items

- Several cross-functional dependencies and business-owned deliverables require closure before configuration and migration activities can accelerate fully
- Finance Table of Authority (`Workflow_Finance.xlsx`) has several unresolved gaps against AU regulations and Africa CDC's own SOPs — see governance review below; four approver roles still have no assigned staff member, and two roles (Certification Officer, Tax Officer) are only covered by staff outside Active status
- The D365 Workflow Catalog (WF-CAT-001, still in Draft) has mismatched AU Financial Rule citations and reused workflow IDs (WF-XM-002, WF-XM-003, WF-XM-006) that need resolving before it is finalized

## Status Log

### 2026-08-21

- Reviewed `Workflow_Finance (12).xlsx` (Finance/Budget Module Table of Authority) against the AU Financial Rules & Regulations, AU Procurement Manual 2024, AU Travel Policy, and Africa CDC's own internal SOP/process-map library and D365 Workflow Catalog
- Findings written up in `finance-workflow-governance-review-2026-08-21.md` in this folder: 5 high-severity items (missing pre-Finance approval stage on AP payments, advance-payment chain diverging from documented SOP, a bank-reconciliation segregation-of-duties conflict, mismatched regulatory citations and duplicate workflow IDs in the D365 Workflow Catalog), plus several medium/low items and a summary of the workbook's own self-flagged open items
- No changes made to the workbook itself; findings are ready to circulate to the Director of Finance, Procurement/Supply Chain, and the Workflow Catalog owner for confirmation

### 2026-08-15

- Requirements validation phase completed (Finance, Asset Management, Grants & Projects, Budget Management, HR, Payroll, Fixed Assets), built on business process reviews across the organization
- Transitioned into solution design and technical architecture preparation
- FRDs, architecture artefacts, integration inventories, and implementation workplans produced with the implementation partner
- Overall progress positive; cross-functional and business-owned deliverables still need closure to fully accelerate configuration and migration
