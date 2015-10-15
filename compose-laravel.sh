if [ $# != 1 ] ; then 
echo "USAGE: sh compose-laravel.sh directory" 
exit 1; 
fi 

# 安装 laravel 到当前目录
composer create-project laravel/laravel $1  --prefer-dist -vvv --no-dev --repository-url=http://packagist.phpcomposer.com


# 设置目录权限
chmod -R 777 $1/storage $1/bootstrap/cache

# 
cp build.sh $1;