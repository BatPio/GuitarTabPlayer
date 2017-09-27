/*
 * Copyright (c) Piotr Bator <prbator@gmail.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OCA) {
    
        OCA.GuitarTabPlayer = OCA.GuitarTabPlayer || {};     
    
        OCA.GuitarTabPlayer.PlayerPlugin = {

            $container: null,
    
            attach: function(fileList) {
                this.$container = $('<div id="app-content-guitartabplayer"></div>');
                this._extendFileActions(fileList.fileActions);
            },
    
            hide: function() {
                this.$container.hide();
                FileList.setViewerMode(false);
            },
    
            show: function(downloadUrl, isFileList) {
                if(isFileList === true) {
                    FileList.setViewerMode(true);
                }
                this.loadPlayer(this.$container, downloadUrl);
                this.$container.show();
            },

            loadPlayer: function(container, downloadUrl) {
                var _self = this;
                var viewer = OC.generateUrl('/apps/guitartabplayer/tabPlayer?file={file}', {file: downloadUrl});   
                container.html('<div><div style="float: right;"><div id="guitartabplayer_close" style="color: black;height: 50px;width: 50px;">Close</div></div><iframe id="guitarTabPlayerFrame" style="width:100%;height:100%;display:block;position:absolute;top:50px;z-index:1041;" src="'+viewer+'" sandbox="allow-scripts allow-same-origin allow-popups allow-modals allow-top-navigation" /></div>');
                $('#app-content').append(container);
                $('#guitartabplayer_close').click(function(e){
                    _self.hide();
                });
            },
    
            _extendFileActions: function(fileActions) {
                var self = this;
                fileActions.registerAction({
                    name: 'view',
                    displayName: 'Favorite',
                    mime: 'application/x-guitarpro',
                    permissions: OC.PERMISSION_READ,
                    actionHandler: function(fileName, context) {
                        var downloadUrl = context.fileList.getDownloadUrl(fileName, context.dir);
                        if (downloadUrl && downloadUrl !== '#') {
                            self.show(downloadUrl, true);
                        }
                    }
                });
                fileActions.setDefault('application/x-guitarpro', 'view');
            }
        };
    
})(OCA);

OC.Plugins.register('OCA.Files.FileList', OCA.GuitarTabPlayer.PlayerPlugin);
    