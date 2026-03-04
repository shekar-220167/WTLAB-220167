# Git Industry Commands Practice
# 1.Git configuration commands

# syntax
git config --global user.name "username"

# purpose
It is used to set the username for Git commits.

# example
git config --global user.name "Shekar"

# syntax
git config --global user.email "email"

# purpose
It is used to set the email address for Git commits.

# example
git config --global user.email "shekar@gmail.com"

# syntax
git config --list

# purpose
It is used to display all the Git configuration settings.

# example
git config --list

# syntax
git config --unset user.name

# purpose
It is used to remove a configuration value.

# example

# 2.Repository Setup Commands

# syntax
git init

# purpose
It is used to initialize a new Git repository in a project folder.

# example
git init

# syntax
git clone repository-url

# purpose
It is used to copy an existing GitHub repository to the local system.

# example
git clone https://github.com/shekar/WTlab.git

# syntax
git clone --branch branch-name repository-url

# purpose
It is used to clone a specific branch from a repository.

# example
git clone --branch main https://github.com/shekar/WTlab.git

# syntax
git clone --depth number repository-url

# purpose
It is used to clone a repository with limited commit history.

# example
git clone --depth 1 https://github.com/shekar/WTlab.git

# 3.Repository Status & Inspection

# syntax
git status

# purpose
It is used to check the status of files in the repository.

# example
git status

# syntax
git log

# purpose
It is used to show the commit history of the repository.

# example
git log

# syntax
git log --oneline

# purpose
It is used to display commit history in a short one-line format.

# example
git log --oneline

# syntax
git log --graph

# purpose
It is used to show the commit history in a graphical format.

# example
git log --graph

# syntax
git show commit-id

# purpose
It is used to display detailed information about a specific commit.

# example
git show a1b2c3

# syntax
git diff

# purpose
It is used to show differences between modified files and the last commit.

# example
git diff

# syntax
git diff --staged

# purpose
It is used to show differences between staged files and the last commit.

# example
git diff --staged

# syntax
git blame filename

# purpose
It is used to see who last modified each line of a file.

# example
git blame index.html

# syntax
git reflog

# purpose
It is used to display the history of all Git actions like commits and resets.

# example
git reflog

# syntax
git shortlog

# purpose
It is used to summarize commit history by author.

# example
git shortlog