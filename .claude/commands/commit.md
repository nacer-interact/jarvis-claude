# /commit

> Commande pour sauvegarder mon travail dans Git en un commit propre et bien décrit.

---

## Mission

Quand je lance `/commit`, exécute la séquence suivante :

### Étape 1 : État des lieux

Lance en parallèle :
- `git status` pour voir les fichiers modifiés et non suivis
- `git diff` pour voir les changements non indexés
- `git diff --staged` pour voir les changements déjà indexés
- `git log -5 --oneline` pour connaître le style des derniers messages de commit

### Étape 2 : Vérification de sécurité

Avant de proposer quoi que ce soit, vérifie qu'aucun fichier sensible ne va être commité :
- Jamais `.env` ou toute variante contenant de vraies clés/secrets
- Si un fichier suspect apparaît dans `git status` (clé, token, credentials), signale-le clairement et demande confirmation avant de continuer

### Étape 3 : Proposer le commit

Si rien n'est à commiter, dis-le simplement et arrête-toi là.

Sinon, résume les changements et propose :
- La liste des fichiers à inclure (par défaut, tous les fichiers modifiés/non suivis pertinents, jamais un `git add -A` aveugle si des fichiers suspects sont présents)
- Un message de commit concis (1-2 phrases) qui explique le "pourquoi" plutôt que le "quoi", cohérent avec le style des commits précédents

```
Voici ce que je vais commiter :
- [fichier 1]
- [fichier 2]

Message proposé : "[message de commit]"

Ça te va ?
```

### Étape 4 : Exécuter

Une fois validé :
1. `git add` uniquement les fichiers pertinents (jamais `.env`)
2. `git commit` avec le message validé, en ajoutant en pied de message :
   ```
   Co-Authored-By: Claude Sonnet 5 <noreply@anthropic.com>
   ```
3. `git status` pour confirmer que l'arbre de travail est propre

### Étape 5 : Confirmer

```
C'est sauvegardé. Commit [hash court] : "[message]"
```

---

## Règles importantes

- Ne jamais commiter sans validation explicite du message et de la liste des fichiers
- Ne jamais utiliser `git add -A` ou `git add .` sans avoir vérifié `git status` au préalable
- Ne jamais commiter `.env` ou tout fichier contenant de vraies clés/secrets
- Ne jamais utiliser `--no-verify`, `--amend`, ou toute option qui contourne les hooks ou réécrit l'historique, sauf demande explicite
- Ne jamais pousser vers un remote (`git push`) sans demande explicite séparée
- Créer toujours un nouveau commit plutôt que d'amender, sauf demande explicite
- Communication en français systématique
