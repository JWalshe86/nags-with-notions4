#!/bin/sh
# start a new session detached?
tmux new-session -d
#send a command to the 0 pane
tmux send-keys -t 0 'z ~/projects/Nags-With-Notions4 && clear' C-m
tmux rename-window 'nwn4'
# splits window into two panes
tmux split-window -h 
tmux send-keys -t 1 'z ~/projects/Nags-With-Notions4 && xdg-open 'https://github.com/JWalshe86/dotfiles_github/wiki/tmux' && clear' C-m
# splits top pane into two equal halves
tmux split-window -v
# send a command to pane 1 to start the live server
tmux send-keys -t 2 'z ~/projects/Nags-With-Notions4 && live-server' C-m
# have cursor at pane 0
tmux select-pane -t 0
tmux -2 attach-session                      
