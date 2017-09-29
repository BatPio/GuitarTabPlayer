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
                this.$container.html("");
                FileList.setViewerMode(false);
                $('#app-content-files').show();
            },
    
            show: function(downloadUrl, isFileList) {
                if(isFileList === true) {
                    FileList.setViewerMode(true);
                    $('#app-content-files').hide();
                }
                this.loadPlayer(this.$container, downloadUrl);
                this.$container.show();
            },

            loadPlayer: function(container, downloadUrl) {
                var _self = this;
                var viewer = OC.generateUrl('/apps/guitartabplayer/tabPlayer?file={file}', {file: downloadUrl});   
                container.html('<div><span id="guitartabplayer_close" style="position: absolute; right: 0; z-index: 1; font-size: 25px; line-height: 55px; width: 55px;">&#x2716;</span><iframe id="guitarTabPlayerFrame" style="width:100%;height:100%;display:block;position:absolute;top:0px;" src="'+viewer+'" sandbox="allow-scripts allow-same-origin allow-popups allow-modals allow-top-navigation" /></div>');
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
    