#这是修改git某个仓库分支（一般是master)提交历史里的用户名和邮箱的bash脚本。
#注意是提交历史，一般git log显示的那个用户名和邮箱
#用户名和邮箱不是代码里的内容，而是git log中的内容
#脚本里重点是那三个变量：
#	OLD_EMAIL 写上旧的邮箱
#	CORRECT_NAME写上新的用户名
#	CORRECT_EMAIL写上新的邮箱
#!/bin/sh
git filter-branch --env-filter '
OLD_EMAIL="liumingwei@XXXXX.com"
CORRECT_NAME="xiaoliushifu"
CORRECT_EMAIL="872140945@qq.com"
if [ "$GIT_COMMITTER_EMAIL" = "$OLD_EMAIL" ]
then
    export GIT_COMMITTER_NAME="$CORRECT_NAME"
    export GIT_COMMITTER_EMAIL="$CORRECT_EMAIL"
fi
if [ "$GIT_AUTHOR_EMAIL" = "$OLD_EMAIL" ]
then
    export GIT_AUTHOR_NAME="$CORRECT_NAME"
    export GIT_AUTHOR_EMAIL="$CORRECT_EMAIL"
fi
' --tag-name-filter cat -- --branches --tags
#执行完上述脚本后，就把本地的demo.git里的信息修改过来了，然后还要push到远程
#执行如下的命令：
#git push --force --tags origin 'refs/heads/*'

#正常情况下，push后在远程github上查看时，就会更新过来了，你的头像也显示了