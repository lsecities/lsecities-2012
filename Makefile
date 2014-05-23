.PHONY: deploy check-env

mktmp:
	mkdir -p $(LSECITIES_THEME_TMPDIR)/$(DEPLOY_BRANCH)

sync-theme:
	git checkout $(DEPLOY_BRANCH)
	rsync -rav --delete --exclude=.git --exclude-from=.gitignore . $(LSECITIES_THEME_TMPDIR)/$(DEPLOY_BRANCH)/

vendor-install:
	cd $(LSECITIES_THEME_TMPDIR)/$(DEPLOY_BRANCH) && composer install
	cd $(LSECITIES_THEME_TMPDIR)/$(DEPLOY_BRANCH) && bower install
	
go-live:
	rsync -rav --delete $(LSECITIES_THEME_TMPDIR)/$(DEPLOY_BRANCH)/ $(LSECITIES_THEME_LIVEDIR)

deploy: check-env mktmp sync-theme vendor-install go-live

check-env:
ifndef LSECITIES_THEME_TMPDIR
	$(error LSECITIES_THEME_TMPDIR is undefined)
endif
ifndef LSECITIES_THEME_LIVEDIR
	$(error LSECITIES_THEME_LIVEDIR is undefined)
endif
ifndef DEPLOY_BRANCH
	$(error DEPLOY_BRANCH is undefined)
endif
