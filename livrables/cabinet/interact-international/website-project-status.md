# Interact International Corporate Website — Status

_Last updated: 2026-08-15_

## Goal / Objective

Build the Interact ecosystem's online presence and drive traffic and opportunities.

## Description

Build the corporate website of Interact International, as well as its advisory and its technology branches' websites. Intended to provide visibility for all of Cabinet's projects.

## Current Phase

WordPress core installed and live on the parent domain. Content, theme, and branding still to be built (advisory and technology branch sites not started).

## Completed

- SSH access set up to the o2switch account (key-based, WP-CLI available)
- MySQL database and user created and privileged
- WordPress core installed via WP-CLI at `interact-international.com`, title "Interact International Corporate portal"
- Pretty permalinks and REST API confirmed working
- Site verified reachable over HTTPS

## In Progress / Up Next

- Choose and install a theme
- Build out actual content/pages for the parent site
- Advisory and technology branch sites (not started)

## Deadline

End of August 2026

## Status Log

### 2026-08-15
- Project created: build the corporate website of Interact International plus its advisory and technology branches' websites
- Goal: build the Interact ecosystem's online presence and drive traffic and opportunities
- Deadline set: end of August 2026
- Hosting infrastructure already in place ahead of this kickoff: `interact-international.com` set up as an addon domain on o2switch with mail routing kept on Google Workspace (see this theme's main `project-status.md` for the hosting details)
- SSH access configured (key-based) to enable WP-CLI management
- WordPress core installed on the parent domain, database provisioned, permalinks and REST API confirmed working
- Admin username set to a non-default value (`iiportal_mgr`) rather than `admin`; DB and admin credentials stored in `.env`, rotated once after initial generation
