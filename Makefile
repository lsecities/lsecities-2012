# This is the Makefile used to deploy specific branches of the
# theme's repository to a live (dev/staging/production) theme
# folder on the local machine
#
# It makes use of a temporary folder ($THEME_TMPDIR), where the
# requested branch is copied to, prepared by running composer install
# and bower install; the resulting theme folder is then rsynced to
# the live folder ($THEME_LIVEDIR).
#
# If $THEME_TMPDIR and $THEME_LIVEDIR are set in the local environment,
# the deployment is typically done by invoking
# make DEPLOY_BRANCH=deploy/live
#
# Why this Makefile? Capistrano could do the same using a widespread
# tool - but the task here is so simple and we avoid installing
# any extra software.
#
# Why not let make take care of temporary folders, etc? We could,
# but leaving the previous build artifacts around can make successive
# deploys almost instant.

.PHONY: clean mktmp sync-theme vendor-install go-live deploy check-env

clean: check-env
	rm -rf $(THEME_TMPDIR)/*
  
mktmp: check-env
	mkdir -p $(THEME_TMPDIR)/$(DEPLOY_BRANCH)

sync-theme: check-env mktmp
	git checkout $(DEPLOY_BRANCH)
	rsync -rav --delete --exclude=.git --exclude-from=.gitignore . $(THEME_TMPDIR)/$(DEPLOY_BRANCH)/

vendor-install: check-env sync-theme
	cd $(THEME_TMPDIR)/$(DEPLOY_BRANCH) && composer install
	cd $(THEME_TMPDIR)/$(DEPLOY_BRANCH) && bower install
	cd $(THEME_TMPDIR)/$(DEPLOY_BRANCH) && npm install --production
	
go-live: check-env vendor-install
	mkdir -p $(THEME_LIVEDIR)
	rsync -rav --delete $(THEME_TMPDIR)/$(DEPLOY_BRANCH)/ $(THEME_LIVEDIR)

deploy: check-env mktmp sync-theme vendor-install go-live

check-env:
ifndef THEME_TMPDIR
	$(error THEME_TMPDIR is undefined)
endif
ifndef THEME_LIVEDIR
	$(error THEME_LIVEDIR is undefined)
endif
ifndef DEPLOY_BRANCH
	$(error DEPLOY_BRANCH is undefined)
endif
