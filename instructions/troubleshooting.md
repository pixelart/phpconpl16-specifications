### Are you stuck and not ready for the next step?

Actually, no problem! You can just skip up to the starting point of whatever
we're working on right now.

For example, if you get stuck on "Step 04 - From rule to specification", you
can just move to the `04` tag and keep coding along with us
on the next step (all explained below).

### How to switch to a step?

First, find out which step you want to switch to. Then, run the following
command, replacing `04` with the name of the tag from the step before.
NOTE: this will delete any work you've done and move you to
**our** version of the fresh branch.

The first command removes all your work and the second command actually
switches you to the new starting point.

```bash
git clean -fd && git reset HEAD . && git checkout .
git checkout -b working 04
```

The word `working` can actually be anything. If you already have a `working`
branch, just change this to anything else, like `my-second-working-branch`.

If the `composer.json` change between or we added a composer package in the
step instructions you must execute a `composer install` too.
