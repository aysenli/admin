if [ $# != 1 ] ; then 
echo "USAGE: sh build.sh debug or release" 
exit 1; 
fi 
CHANNEL=$1;

PHPMD="./vendor/bin/phpmd";

# echo $CHANNEL;

# svn co $SVN ./
rm composer.lock

if [ $CHANNEL = "debug" ]; then

    echo "=====copy channel/.env.debug to .env";
    cp channel/.env.debug ./.env
    # 安装vendor
    composer install --dev -vvv;

fi;

if [ $CHANNEL = "release" ]; then

    echo "=====copy channel/.env.release to .env";
    cp channel/.env.release ./.env
    # 安装vendor
    composer install --no-dev -vvv;
fi;



# 静态代码检查
$PHPMD ./app text unusedcode, codesize

composer dump-autoload --optimize



