import { cn } from "@/lib/utils";
import logoSabeel from "@/assets/logo-sabeel.jpeg";

interface LogoProps {
  className?: string;
  size?: 'sm' | 'md' | 'lg';
  showText?: boolean;
}

export const Logo = ({ className, size = 'md', showText = true }: LogoProps) => {
  const sizeClasses = {
    sm: 'h-8',
    md: 'h-10',
    lg: 'h-14',
  };

  return (
    <div className={cn("flex items-center gap-3", className)}>
      <img
        src={logoSabeel}
        alt="Logo Sabeel"
        className={cn(sizeClasses[size], "w-auto object-contain")}
      />
      
      {showText && (
        <div className="flex flex-col">
          <span className={cn(
            "font-semibold leading-tight text-foreground",
            size === 'sm' && "text-sm",
            size === 'md' && "text-base",
            size === 'lg' && "text-xl"
          )}>
            Amis de Sabeel
          </span>
          <span className={cn(
            "text-primary font-medium",
            size === 'sm' && "text-xs",
            size === 'md' && "text-sm",
            size === 'lg' && "text-base"
          )}>
            France
          </span>
        </div>
      )}
    </div>
  );
};
